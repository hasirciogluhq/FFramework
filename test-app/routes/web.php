<?php

use FFramework\Http\Request;
use FFramework\Router\Router;
use FFramework\View\View as FFrameworkView;

return function (Router $router): void {
    $router->get('/', function () {
        return FFrameworkView::render("welcome");
    });

    $router->get('/test', function () {});

    $router->group('/hello', function (Router $group) {

        $group->get("/", function () {
            echo "Hello";
        });

        $group->get("bro", function () {
            echo "Hello bro";
        });

        $group->get("bro/:name", function ($params, Request $request) {
            echo "Hello bro " . $request->getParam("name") . " | => ";
        });

        $group->get("bro/:name/comein", function ($params, Request $request) {
            echo "Hello bro " . $request->getParam("name") . " Welcome Back! come in >";
        });
    });
};
