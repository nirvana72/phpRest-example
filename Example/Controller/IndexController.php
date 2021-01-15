<?php

// /**
//  * 控制器摘要                            [可选, 默认 AbcController = abc]
//  * 
//  * 控制器描述, bala bala bala ...        [可选, 默认空]
//  * 
//  * @path /index                         [可选, 默认 AbcController = /abc, AbcDefController = /abc_def, 如果写 / 表示没有一级路由]
//  * @hook \App\Hook\TestHook1            [可选, 优先级 全局Hook > controllerHook > functionHook ] @see HookController.php
//  */
// class IndexController
// {
//     /**
//      * 方法摘要                          [可选, 默认空]
//      * 
//      * 方法描述, bala bala bala ...      [可选, 默认空]
//      * 
//      * @route GET /demo1                [必选, 不写@route, 不会被注册为路由]
//      * @hook \App\Hook\TestHook2        [可选, 格式 '@hook namespace params', params 会传给Hook类的构造函数]
//      * @hook \App\Hook\TestHook3        [可选]
//      * @param string $p1 参数描述p1      @see ParamsController.php
//      * @param string $p2 参数描述p2
//      * @return void                     [可选, 默认 { ret: 1, msg: ''} ]
//      */
//     public function demo1($p1, $p2) 
//     {
//         return 'ok';
//     }
// }

namespace Example\Controller;

class IndexController
{
    /**
     * @route GET /demo1
     */
    public function demo1() 
    {
        return 'ok';
    }
}
