<?php

namespace Sq1;

use Exception;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Exception\ResourceNotFoundException;
use Symfony\Component\Routing\Matcher\UrlMatcher;
use Symfony\Component\HttpKernel\Controller\ControllerResolver;
use Symfony\Component\HttpKernel\Controller\ArgumentResolver;

class Framework
{

    public function __construct(
        private UrlMatcher $urlMatcher,
        private ControllerResolver $controllerResolver,
        private ArgumentResolver $argumentResolver
    )
    {
        //
    }

    public function handle(Request $request) : Response
    {
        $this->urlMatcher->getContext()->fromRequest($request);

        try {
            $request->attributes->add($this->urlMatcher->match($request->getPathInfo()));

            $controller = $this->controllerResolver->getController($request);
            $arguments = $this->argumentResolver->getArguments($request, $controller);

            return call_user_func_array($controller, $arguments);

        } catch (ResourceNotFoundException $e) {

            return new Response('Not Found', 404);

        } catch (Exception $e) {

            return new Response('Internal Server Error', 500);
        }


    }


}