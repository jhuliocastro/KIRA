<?php

require "vendor/autoload.php";

use CoffeeCode\Router\Router;

$router = new Router(URL);

$router->namespace("Controllers");

$router->get("/", "Dashboard:home");

$router->dispatch();