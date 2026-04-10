<?php

namespace FFramework\Core;


class Config
{
    public array $config = [];

    public function get(string $key): string|bool
    {
        return $this->config[$key];
    }

    public function set(string $key, string|bool $value): void
    {
        $this->config[$key] = $value;
    }
}
