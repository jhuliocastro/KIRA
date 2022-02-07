<?php

require "vendor/autoload.php";

use CoffeeCode\Router\Router;

$router = new Router(URL);

$router->namespace("Controllers");

$router->get("/", "Dashboard:home");

$router->group("python");
$router->post("/sintetizador", "Python:sintetizador");
$router->post("/luzQuarto/desliga", "Python:luzQuartoDesliga");
$router->post("/luzQuarto/liga", "Python:luzQuartoLiga");

$router->dispatch();