<?php

namespace App\Middleware;

use App\Core\Middleware\MiddlewareInterface;
use App\Core\Http\Request;


class SecondMiddleware implements MiddlewareInterface
{
    public function __invoke(Request $request, callable $next)
    {
        dump('second middleware');
        $request->code = 401;
        return $next($request);
    }
}