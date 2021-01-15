<?php
namespace Example\Controller;

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
        // 执行顺序 
        //  TestHook2
        //  TestHook1
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
        // 执行顺序 
        //  TestHook2
        //  TestHook1
        //  TestHook3
        return 'demo2';
    }
}
