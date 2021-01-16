<?php
namespace Example\Controller;

use Symfony\Component\HttpFoundation\Request;

/**
 * 参数绑定
 * 
 * 一个演示参数绑定的控制器
 * 
 * @path /params
 */
class ParamsController
{
    /**
     * @route GET /demo1
     */
    public function demo1($p1) 
    {
        // 最简写法 请求 <domain>/params/demo1?p1=xxx
        return "p1 = {$p1}";
    }

    /**
     * @route GET /demo2
     * @param string $p1 p1描述
     * @param string $p2 描述可不写, 默认等于参数名 p2
     * @param        $p3 参数类型可不写, 默认为 mixed
     * @param string $p4 参数默认必传,除非在function中给了默认值,参数为可选
     */
    public function demo2($p1, $p2, $p3, $p4 = 'p4') 
    {
        return "p1 = {$p1}, p2 = {$p2}, p3 = {$p3}, p4 = {$p4}";
    }

    /**
     * demo3
     * 
     * path rule see https://github.com/nikic/FastRoute
     * 
     * @route GET /demo3/{id}
     * @param string $id    id
     * @param string $token token {@bind headers.token}
     */
    public function demo3($id, $token) 
    {
        // 同时指定path参数和 get/post参数， 优先取 path参数
        // {@bind headers.token} 可从header 中取参
        // 
        // POST, PUT 请求， 参数默认为 {@bind request.xxx}
        // 其它请求， 参数默认为       {@bind query.xxx}
        // 
        // 如果 POST 请求要取get 参数 需要指定 {@bind query.xxx}
        // 同样 GET  请求要取post参数 需要指定 {@bind request.xxx}
        return "id = {$id}, token = {$token}";
    }

    /**
     * demo4
     * 
     * 参数校验
     * 
     * rules:
     * see https://github.com/vlucas/valitron#built-in-validation-rules
     *
     * @route GET /demo4
     * @param string    $p1   随意值
     * @param int       $p2   等同于integer
     * @param integer   $p3   p3
     * @param numeric   $p4   p4
     * @param email     $p5   p5
     * @param url       $p6   p6
     * @param alpha     $p7   p7
     * @param alphaNum  $p8   p8
     * @param slug      $p9   p9
     * @param date      $p10  p10
     * @param time      $p11  p11
     * @param dateTime  $p12  p12
     * @param ip        $p13  p13
     * @param string    $p14  p14 {@rule length=6}
     * @param int       $p15  p15 {@rule min=1|max=6}
     * @param string    $p16  p16 {@rule in=red,blue,yellow}
     */
    public function demo4($p1, $p2, $p3, $p4, $p5, $p6, $p7, $p8, $p9, $p10, $p11, $p12, $p13, $p14, $p15, $p16) {

        // @param integer  $p3  p3   等同于  @param int    $p3  p3  {@rule integer}
        // @param alpha    $p7  p7   等同于  @param string $p7  p7  {@rule alpha}
        // @param dateTime $p12 p12  等同于  @param string $p12 p12 {@rule dateFormat=Y-m-d H:i:s}
        $res = [
            'p1' => $p1, // abc
            'p2' => $p2, // 1
            'p3' => $p3, // 3
            'p4' => $p4, // 64.4
            'p5' => $p5, // 15279663@qq.com
            'p6' => $p6, // http://www.163.com
            'p7' => $p7, // aa
            'p8' => $p8, // a142
            'p9' => $p9, // a1_
            'p10' => $p10, // 2020-11-11
            'p11' => $p11, // 11:11:11
            'p12' => $p12, // 2020-11-11 11:11:11
            'p13' => $p13, // 127.0.0.1
            'p14' => $p14, // aaaaaa
            'p15' => $p15, // 4
            'p16' => $p16  // red
        ];
        \PhpRest\dump($res); // \PhpRest\dump方法来自 ThinkPhp框架，提供更友好的浏览器输出
        return 'OK';
    }

    /**
     * demo5
     * 
     * 数组参数绑定
     * 
     * @route POST /demo5
     * @param int[] $ary ary
     */
    public function demo5($ary) 
    {
        // @param string[] $ary ary  必需提交一个数组
        // @param int[]    $ary ary  必需提交一个全是整形的数组
        // @param ip[]     $ary ary  必需提交一个全是合法IP的数组
        // @param data[]   $ary ary  必需提交一个全是合法日期字符串的数组
        // ... 
        \PhpRest\dump($ary);
        return 'OK';
    }

    /**
     * 直接绑定 Request 对象
     * 
     * 别忘了 use Symfony\Component\HttpFoundation\Request;
     * Request: https://symfony.com/doc/current/components/http_foundation.html#request
     * 
     * @route GET /demo6
     */
    public function demo6(Request $request) 
    {
        return $request->query->all();
    }
}
