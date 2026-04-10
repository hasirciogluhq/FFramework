<?php

namespace FFramework\Http;

class Request
{
    public string $method;
    public string $uri;
    public array $headers;
    public string $body;
    public array $query;
    public array $params;
    /** @var array<string, string|null> Eşleşen route URL parametreleri (:id, {id} vb.) */
    private array $routeParams = [];
    public array $files;
    public array $cookies;
    public array $session;


    public function __construct()
    {
        if (!isset($_SERVER['REQUEST_METHOD'])) {
            throw new \RuntimeException('Request object cannot be created in CLI environment.');
        }

        $this->method  = $_SERVER['REQUEST_METHOD'];
        $this->uri     = parse_url($_SERVER['REQUEST_URI'], PHP_URL_PATH);
        $this->headers = getallheaders() ?: [];
        $this->body    = file_get_contents('php://input') ?: '';
        $this->query   = $_GET;
        $this->params  = $_POST;
        $this->files   = $_FILES;
        $this->cookies = $_COOKIE;

        if (session_status() === PHP_SESSION_NONE) {
            session_start();
        }
        $this->session = $_SESSION;
    }

    public function getMethod(): string
    {
        return $this->method;
    }

    public function getUri(): string
    {
        return $this->uri;
    }

    public function getHeaders(): array
    {
        return $this->headers;
    }

    public function getBody(): string
    {
        return $this->body;
    }

    public function getQuery(): array
    {
        return $this->query;
    }

    public function getParams(): array
    {
        return $this->params;
    }

    /**
     * Router tarafından eşleşen path parametrelerini bağlar (POST ile karışmaz).
     */
    public function mergeRouteParams(array $params): void
    {
        $this->routeParams = $params;
    }

    public function getRouteParams(): array
    {
        return $this->routeParams;
    }

    public function getParam(string $name): string
    {
        if (array_key_exists($name, $this->routeParams)) {
            $v = $this->routeParams[$name];
            return $v !== null && $v !== '' ? urldecode((string) $v) : '';
        }

        return isset($this->params[$name])
            ? (is_scalar($this->params[$name]) ? (string) $this->params[$name] : '')
            : '';
    }

    public function getFiles(): array
    {
        return $this->files;
    }

    public function getCookies(): array
    {
        return $this->cookies;
    }

    public function getSession(): array
    {
        return $this->session;
    }

    public function json(): mixed
    {
        return json_decode($this->body, true);
    }

    public function isJson(): bool
    {
        return str_contains($this->headers['Content-Type'] ?? '', 'application/json');
    }

    public static function isHttp(): bool
    {
        return isset($_SERVER['REQUEST_METHOD']);
    }

    public static function capture(): static
    {
        return new static();
    }
}
