<?php
namespace Example\Hook;

use PhpRest\Hook\HookInterface;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;

class TestHook2 implements HookInterface
{
    /**
     * @param Request $request
     * @param callable $next
     * @return Response
     */
    public function handle(Request $request, callable $next)
    {
        echo 'before TestHook2, ';
        return $next($request);
    }
}