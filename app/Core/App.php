<?php

namespace App\Core;

use App\Core\Middleware\MiddlewareStack;
use App\Core\Middleware\MiddlewareInterface;
use App\Core\Http\Request;


class App
{
    protected $middleware_stack;
    public function __construct(MiddlewareStack $middleware_stack)
    {
        $this->middleware_stack = $middleware_stack;
    }

    public function add(MiddlewareInterface $middleware)
    {
        $this->middleware_stack->add($middleware);
    }

    public function run()
    {
        $result = $this->middleware_stack->handle(new Request());
        dump('run app', $result);
    }
}