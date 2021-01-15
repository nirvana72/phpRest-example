<?php
namespace Example\Hook;

use PhpRest\Controller\Hook\HookInterface;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;

class TestHook3 implements HookInterface
{
    /**
     * @param Request $request
     * @param callable $next
     * @return Response
     */
    public function handle(Request $request, callable $next)
    {
        echo 'before TestHook3, ';
        return $next($request);
    }
}