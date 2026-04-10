<?php

namespace FFramework\Router;

use FFramework\Router\Router;

class RouteLoader
{
    private string $routesPath;

    public function __construct(string $routesPath)
    {
        $this->routesPath = rtrim($routesPath, '/');
    }

    public function load(Router $router): void
    {
        if (!is_dir($this->routesPath)) {
            throw new \RuntimeException("Routes klasörü bulunamadı: {$this->routesPath}");
        }

        // Önce web.php, sonra api.php, sonra geri kalanlar
        $priority = ['web.php', 'api.php'];
        $files    = glob($this->routesPath . '/*.php') ?: [];

        // Önce priority'dekileri yükle
        foreach ($priority as $file) {
            $path = $this->routesPath . '/' . $file;
            if (file_exists($path)) {
                $this->loadFile($path, $router);
            }
        }

        // Sonra geri kalanları yükle (web ve api hariç)
        foreach ($files as $file) {
            if (in_array(basename($file), $priority)) {
                continue;
            }
            $this->loadFile($file, $router);
        }
    }

    private function loadFile(string $file, Router $router): void
    {
        $routes = require $file; // return değerini yakala

        if ($routes instanceof \Closure) {
            $routes($router);
            return;
        }

        throw new \RuntimeException(
            basename($file) . " bir closure döndürmeli."
        );
    }
}
