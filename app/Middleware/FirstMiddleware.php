<?php

namespace App\Middleware;

use App\Core\Middleware\MiddlewareInterface;
use App\Core\Http\Request;


class FirstMiddleware implements MiddlewareInterface
{
    public function __invoke(Request $request, callable $next)
    {
        dump('first middleware');

        return $next($request);
    }
}