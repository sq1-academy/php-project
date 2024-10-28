<?php

use App\IndexController;
use Symfony\Component\Routing\Route;
use Symfony\Component\Routing\RouteCollection;

$routes = new RouteCollection();

$routes->add('index', new Route('/', [
    '_controller' => [IndexController::class, 'index'],
]));

return $routes;