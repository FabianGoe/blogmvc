<?php

namespace FabianGO\Middleware;

use \Slim\Http\Request;
use \Slim\Http\Response;

class CookieAuthentication
{
    /**
     * Basic authentication middleware that checks if a cookie is set
     *
     * Not safe but used to showcase usage of middleware.
     *
     * @todo: redirect to login page once login authentication functionality is added
     *
     * @param Request $request
     * @param Response $response
     * @param callable $next
     *
     * @return \Psr\Http\Message\ResponseInterface
     */
    public function __invoke(Request $request, Response $response, $next)
    {
        if (!isset($_COOKIE['is_admin']) || $_COOKIE['is_admin'] !== 'true') {
            return $response->withRedirect('/', 403);
        }

        return $next($request, $response);
    }
}