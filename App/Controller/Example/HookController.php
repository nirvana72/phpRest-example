<?php
namespace App\Controller\Example;

/**
 * 演示hook
 * 
 * @path /hook
 * @hook \App\Hook\Example\TestHook2
 */
class HookController
{
    /**
     * demo1
     *
     * @route GET /demo1
     * @hook \App\Hook\Example\TestHook1
     */
    public function demo1() 
    {
        return 'demo1';
    }

    /**
     * demo2
     *
     * @route GET /demo2
     * @hook \App\Hook\Example\TestHook1 aaa
     * @hook \App\Hook\Example\TestHook2 bbb
     * @hook \App\Hook\Example\TestHook3
     */
    public function demo2() 
    {
        return 'demo2';
    }
}
