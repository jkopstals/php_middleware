<?php

namespace App\Core\Middleware;

use App\Core\Middleware\MiddlewareInterface;
use App\Core\Http\Request;


class MiddlewareStack
{
    protected $start;

    public function __construct() //Request $request ???
    {
        $this->start = function(Request $request) {
            dump('start middleware');
            //can be just empty. this is just so that start is callable
            return $request;
        };
    }
    
    public function add(MiddlewareInterface $middleware)
    {
        $next = $this->start;

        $this->start = function(Request $request) use ($middleware, $next) {
            return $middleware($request, $next);
        };
    }

    public function handle(Request $request)
    {
        return call_user_func($this->start, $request);
    }
}