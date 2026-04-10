<?php

namespace FFramework\Router;

use FFramework\Http\Request;

class Router
{
    private array $routes       = [];
    private array $groupStack   = [];
    private array $params       = [];
    private array $errorHandlers = [];
    private array $namedRoutes  = [];

    // ─── HTTP method shortcuts ────────────────────────────────

    public function get(string $path, callable|string $handler): Route
    {
        return $this->addRoute('GET', $path, $handler);
    }

    public function post(string $path, callable|string $handler): Route
    {
        return $this->addRoute('POST', $path, $handler);
    }

    public function put(string $path, callable|string $handler): Route
    {
        return $this->addRoute('PUT', $path, $handler);
    }

    public function patch(string $path, callable|string $handler): Route
    {
        return $this->addRoute('PATCH', $path, $handler);
    }

    public function delete(string $path, callable|string $handler): Route
    {
        return $this->addRoute('DELETE', $path, $handler);
    }

    public function options(string $path, callable|string $handler): Route
    {
        return $this->addRoute('OPTIONS', $path, $handler);
    }

    public function any(string $path, callable|string $handler): Route
    {
        return $this->addRoute('*', $path, $handler);
    }

    // Birden fazla method aynı anda
    public function match(array $methods, string $path, callable|string $handler): array
    {
        $routes = [];
        foreach ($methods as $method) {
            $routes[] = $this->addRoute(strtoupper($method), $path, $handler);
        }
        return $routes;
    }

    // Resource route - Laravel style
    // GET    /users           → index
    // GET    /users/:id       → show
    // POST   /users           → store
    // PUT    /users/:id       → update
    // DELETE /users/:id       → destroy
    public function resource(string $path, string $controller): void
    {
        $name = trim($path, '/');
        $this->get($path, "$controller@index")->name("$name.index");
        $this->get("$path/:id", "$controller@show")->name("$name.show");
        $this->post($path, "$controller@store")->name("$name.store");
        $this->put("$path/:id", "$controller@update")->name("$name.update");
        $this->patch("$path/:id", "$controller@update")->name("$name.update");
        $this->delete("$path/:id", "$controller@destroy")->name("$name.destroy");
    }

    // ─── Group ───────────────────────────────────────────────

    public function group(array|string $attributes, callable $callback): void
    {
        if (is_string($attributes)) {
            $attributes = ['prefix' => $attributes];
        }

        $this->groupStack[] = $attributes;
        $callback($this);
        array_pop($this->groupStack);
    }

    // ─── Named routes ─────────────────────────────────────────

    public function registerNamed(string $name, string $path): void
    {
        $this->namedRoutes[$name] = $path;
    }

    // /users/:id → /users/42
    public function url(string $name, array $params = []): string
    {
        $path = $this->namedRoutes[$name]
            ?? throw new \RuntimeException("Named route bulunamadı: $name");

        foreach ($params as $key => $value) {
            $path = str_replace(":$key", $value, $path);
        }

        return $path;
    }

    // ─── Core ────────────────────────────────────────────────

    private function normalizePath(string $path): string
    {
        // Boş veya sadece slash ise root
        if ($path === '' || $path === '/') {
            return '/';
        }

        // Çift slash temizle: //users → /users
        $path = preg_replace('#/+#', '/', $path);

        // Sondaki slash kaldır: /users/ → /users
        $path = rtrim($path, '/');

        // Başta slash yoksa ekle: users → /users
        if (!str_starts_with($path, '/')) {
            $path = '/' . $path;
        }

        return $path;
    }

    private function addRoute(string $method, string $path, callable|string $handler): Route
    {
        $prefix   = $this->getCurrentPrefix();
        $fullPath = $this->normalizePath($prefix . '/' . ltrim($path, '/'));

        $middlewares = $this->getCurrentMiddlewares();
        $name        = $this->getCurrentName();

        $route = new Route($method, $fullPath, $handler, $middlewares, $name);

        if ($name !== null) {
            $this->namedRoutes[$name] = $fullPath;
        }

        $this->routes[] = $route;
        return $route;
    }

    private function getCurrentPrefix(): string
    {
        return implode('', array_map(
            fn($g) => '/' . trim($g['prefix'] ?? '', '/'),
            $this->groupStack
        ));
    }

    private function getCurrentMiddlewares(): array
    {
        $mws = [];
        foreach ($this->groupStack as $group) {
            if (!empty($group['middleware'])) {
                $mws = array_merge($mws, (array) $group['middleware']);
            }
        }
        return $mws;
    }

    private function getCurrentName(): ?string
    {
        $parts = [];
        foreach ($this->groupStack as $group) {
            if (!empty($group['name'])) {
                $parts[] = $group['name'];
            }
        }
        return empty($parts) ? null : implode('', $parts);
    }

    // ─── Dispatch ────────────────────────────────────────────

    public function dispatch(Request $request): void
    {
        try {
            $method = strtoupper($request->getMethod());
            $uri    = $this->normalizePath(
                parse_url($request->getUri(), PHP_URL_PATH) ?? '/'
            );

            // OPTIONS - CORS preflight
            if ($method === 'OPTIONS') {
                http_response_code(204);
                return;
            }

            $methodNotAllowed = false;

            foreach ($this->routes as $route) {
                if (!$this->matchRoute($uri, $route->path)) {
                    continue;
                }

                // Path match etti ama method farklı
                if (!in_array($route->method, [$method, '*'])) {
                    $methodNotAllowed = true;
                    continue;
                }

                // Middleware pipeline
                foreach ($route->middlewares as $mw) {
                    $result = $this->runMiddleware($mw, $this->params, $request);
                    if ($result === false) {
                        return; // middleware durdurdu
                    }
                }

                $this->runHandler($route->handler, $this->params, $request);
                return;
            }

            if ($methodNotAllowed) {
                $this->handleMethodNotAllowed($request);
                return;
            }

            $this->handleNotFound($request);
        } catch (\Throwable $e) {
            $this->handleServerError($e, $request);
        }
    }

    // ─── Route matching ──────────────────────────────────────

    private function matchRoute(string $uri, string $routePath): bool
    {
        // Wildcard: /storage/* gibi
        if (str_ends_with($routePath, '*')) {
            $base = rtrim(substr($routePath, 0, -1), '/');
            return str_starts_with($uri, $base ?: '/');
        }

        // Regex route: {pattern} ile tanımlı
        // /users/{id:[0-9]+} gibi
        if (str_contains($routePath, '{')) {
            return $this->matchRegexRoute($uri, $routePath);
        }

        $uriParts   = explode('/', trim($uri, '/'));
        $routeParts = explode('/', trim($routePath, '/'));

        // Optional param: :id? gibi
        $requiredCount = count(array_filter(
            $routeParts,
            fn($p) => !str_ends_with($p, '?')
        ));

        if (
            count($uriParts) < $requiredCount ||
            count($uriParts) > count($routeParts)
        ) {
            return false;
        }

        foreach ($routeParts as $i => $part) {
            $uriSegment = $uriParts[$i] ?? null;

            // Optional param
            if (str_ends_with($part, '?')) {
                $paramName = ltrim(rtrim($part, '?'), ':');
                $this->params[$paramName] = $uriSegment;
                continue;
            }

            // Named param :id
            if (str_starts_with($part, ':')) {
                $this->params[ltrim($part, ':')] = $uriSegment;
                continue;
            }

            if ($part !== $uriSegment) {
                return false;
            }
        }

        return true;
    }

    // /users/{id:[0-9]+} formatı
    private function matchRegexRoute(string $uri, string $routePath): bool
    {
        $pattern = preg_replace_callback(
            '/\{(\w+)(?::([^}]+))?\}/',
            function ($matches) {
                $name  = $matches[1];
                $regex = $matches[2] ?? '[^/]+';
                return "(?P<$name>$regex)";
            },
            $routePath
        );

        $pattern = '@^' . $pattern . '$@';

        if (!preg_match($pattern, $uri, $matches)) {
            return false;
        }

        foreach ($matches as $key => $value) {
            if (is_string($key)) {
                $this->params[$key] = $value;
            }
        }

        return true;
    }

    // ─── Handler & Middleware ─────────────────────────────────

    private function runHandler(mixed $handler, ...$args): void
    {
        if (is_callable($handler)) {
            call_user_func($handler, ...$args);
            return;
        }

        [$controllerClass, $method] = explode('@', $handler);

        if (!class_exists($controllerClass)) {
            throw new \RuntimeException("Controller bulunamadı: $controllerClass");
        }

        $controller = new $controllerClass();

        if (!method_exists($controller, $method)) {
            throw new \RuntimeException("Method bulunamadı: $controllerClass@$method");
        }

        $controller->$method(...$args);
    }

    private function runMiddleware(callable|string $middleware, ...$args): mixed
    {
        if (is_callable($middleware)) {
            return $middleware(...$args);
        }

        $parts  = explode('@', $middleware);
        $class  = $parts[0];
        $method = $parts[1] ?? 'handle';

        if (!class_exists($class)) {
            throw new \RuntimeException("Middleware bulunamadı: $class");
        }

        return (new $class())->$method(...$args);
    }

    // ─── Error handlers ──────────────────────────────────────

    public function onError(int $code, callable|string $handler): void
    {
        $this->errorHandlers[$code] = $handler;
    }

    private function handleNotFound(Request $request): void
    {
        http_response_code(404);
        header($_SERVER['SERVER_PROTOCOL'] . ' 404 Not Found');

        if (isset($this->errorHandlers[404])) {
            $this->runHandler($this->errorHandlers[404], $this->params, $request, 404);
            return;
        }

        header('Content-Type: application/json');
        echo json_encode(['error' => 'Not Found', 'path' => $request->getUri()]);
    }

    private function handleMethodNotAllowed(Request $request): void
    {
        http_response_code(405);
        header($_SERVER['SERVER_PROTOCOL'] . ' 405 Method Not Allowed');

        if (isset($this->errorHandlers[405])) {
            $this->runHandler($this->errorHandlers[405], $this->params, $request, 405);
            return;
        }

        header('Content-Type: application/json');
        echo json_encode(['error' => 'Method Not Allowed']);
    }

    private function handleServerError(\Throwable $e, Request $request): void
    {
        http_response_code(500);
        header($_SERVER['SERVER_PROTOCOL'] . ' 500 Internal Server Error');

        if (isset($this->errorHandlers[500])) {
            $this->runHandler($this->errorHandlers[500], $this->params, $request, 500, $e);
            return;
        }

        header('Content-Type: application/json');
        echo json_encode([
            'error'   => 'Internal Server Error',
            'message' => $e->getMessage(),
            'file'    => $e->getFile(),
            'line'    => $e->getLine(),
        ]);
    }

    // ─── Helpers ─────────────────────────────────────────────

    public function getParam(string $name): ?string
    {
        return isset($this->params[$name])
            ? urldecode($this->params[$name])
            : null;
    }

    public function getParams(): array
    {
        return $this->params;
    }

    public static function redirect(string $url, int $delay = 0): void
    {
        if ($delay > 0) {
            header("Refresh: $delay, $url");
        } else {
            header("Location: $url");
            exit;
        }
    }
}
