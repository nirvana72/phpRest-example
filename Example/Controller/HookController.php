<?php
namespace Example\Controller;

/**
 * 演示hook
 * 
 * hook功能类型springboot中的过滤器, 添加在function上, 会先于方法前执行
 * 一般用在验证权限, 缓存结果等使用场景
 * 可写在 controller 上, 该控制器下所有路由都生效
 * 或写在 function   上, 只对指定路由生效
 * HOOK支持一个字符串类型的参数, 可在Hook类构造函数中通过 $param 参数获取
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
