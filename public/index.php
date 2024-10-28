<?php

use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Routing\RequestContext;
use Symfony\Component\Routing\Matcher\UrlMatcher;
use Symfony\Component\HttpKernel\Controller\ControllerResolver;
use Symfony\Component\HttpKernel\Controller\ArgumentResolver;

require __DIR__ . '/../bootstrap.php';

$request = Request::createFromGlobals();

$routes = require ROOT_DIR . '/routes.php';

$matcher = new UrlMatcher($routes, new RequestContext());

$framework = new Sq1\Framework(
    $matcher,
    new ControllerResolver(),
    new ArgumentResolver()
);

$response = $framework->handle($request);

$response->send();
