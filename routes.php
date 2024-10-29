<?php

use App\IndexController;
use Symfony\Component\Routing\Route;
use Symfony\Component\Routing\RouteCollection;

$routes = new RouteCollection();

$routes->add('index', new Route('/', [
    '_controller' => [IndexController::class, 'index'],
]));

$routes->add('hello', new Route('/hello/{name}', [
    '_controller' => [IndexController::class, 'hello'],
]));

return $routes;