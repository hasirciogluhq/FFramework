<?php

// app/Core/Kernel.php
namespace FFramework\Core;

use FFramework\Http\Request;
use FFramework\Router\Router;
use FFramework\Error\Handler;
use FFramework\Core\Config;
use FFramework\Router\RouteLoader;

class Kernel
{
    private static Router $router;
    public static Config $config;

    private static function registerErrorHandlers(): void
    {
        static::$router->onError(404, Handler::handleNotFound(...));
        static::$router->onError(500, Handler::handleExceptions(...));
        static::$router->onError(405, Handler::handleMethodNotAllowed(...));
        static::$router->onError(403, Handler::handleForbidden(...));
        static::$router->onError(401, Handler::handleUnauthorized(...));
        static::$router->onError(400, Handler::handleBadRequest(...));
        static::$router->onError(406, Handler::handleNotAcceptable(...));
        static::$router->onError(407, Handler::handleProxyAuthenticationRequired(...));
        static::$router->onError(408, Handler::handleRequestTimeout(...));
        static::$router->onError(409, Handler::handleConflict(...));
        static::$router->onError(410, Handler::handleGone(...));
        static::$router->onError(411, Handler::handleLengthRequired(...));
        static::$router->onError(412, Handler::handlePreconditionFailed(...));
        static::$router->onError(413, Handler::handleRequestEntityTooLarge(...));
    }


    public static function boot(): void
    {
        static::loadConfig();
        static::bootErrorHandling();
        static::registerBindings();

        if (!Request::isHttp()) {
            return;
        }

        static::$router = new Router();
        static::registerErrorHandlers();

        $request = Request::capture();

        (new RouteLoader(ROOT_PATH . '/routes'))->load(static::$router);

        static::$router->dispatch($request);
    }

    // ─── Private helpers ──────────────────────────────────────

    private static function loadConfig(): void
    {
        static::$config = new Config();
        $debugString = getenv("DEBUG") ?: "false";
        static::$config->set("debug", $debugString === "true" ? true : false);
        static::$config->set("view.path", ROOT_PATH . '/resources/views');
        static::$config->set("view.cache", ROOT_PATH . '/storage/cache/views');
        static::$config->set("site.ssl", 'http');
        static::$config->set("site.domain", 'localhost:8000');

        if ((bool) static::$config->get("debug")) {
            error_reporting(E_ALL);
            ini_set('display_errors', '1');
        } else {
            error_reporting(0);
            ini_set('display_errors', '0');
        }
    }

    private static function bootErrorHandling(): void
    {
        set_error_handler([Handler::class, 'handleErrors']);
        set_exception_handler([Handler::class, 'handleExceptions']);
    }

    private static function registerBindings(): void {}
}
