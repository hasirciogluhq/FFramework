<?php

namespace FFramework\Router;

class Route
{
    public string $method;
    public string $path;
    public mixed  $handler;
    public array  $middlewares;
    public ?string $routeName;

    public function __construct(
        string $method,
        string $path,
        callable|string $handler,
        array  $middlewares = [],
        ?string $name = null,
    ) {
        $this->method      = $method;
        $this->path        = $path;
        $this->handler     = $handler;
        $this->middlewares = $middlewares;
        $this->routeName   = $name;
    }

    public function middleware(string|array $middleware): static
    {
        $this->middlewares = array_merge(
            $this->middlewares,
            (array) $middleware
        );
        return $this;
    }

    public function name(string $name): static
    {
        $this->routeName = $name;
        return $this;
    }
}