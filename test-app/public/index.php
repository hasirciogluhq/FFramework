<?php

define('ROOT_PATH', dirname(__DIR__)); 

require ROOT_PATH . '/../vendor/autoload.php';

use FFramework\Core\Kernel;
use FFramework\Router\Router;
use FFramework\View\View as FFrameworkView;

Kernel::boot();
