<?php
namespace Example\Hook;

use PhpRest\Controller\Hook\HookInterface;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;

class TestHook1 implements HookInterface
{
    public function __construct($method, $uri, $params) 
    {
        echo "method = {$method}, uri = {$uri}, params = {$params}, ";
    }

    /**
     * @param Request $request
     * @param callable $next
     * @return Response
     */
    public function handle(Request $request, callable $next)
    {
        echo 'before TestHook1, ';
        $response = $next($request);
        echo 'after TestHook1, ';
        return $response;
    }
}