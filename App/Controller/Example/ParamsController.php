<?php
namespace App\Controller\Example;

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
    public function demo1($p1, $p2 = 'p2') 
    {
        return "p1 = {$p1}, p2 = {$p2}";
    }

    /**
     * demo2
     * 
     * rules:
     * see https://github.com/nikic/FastRoute
     * 
     * @route GET /demo2/{id}
     */
    public function demo2($id) 
    {
        return "id = {$id}";
    }

    /**
     * demo3
     * 
     * rules:
     * see https://github.com/vlucas/valitron#built-in-validation-rules
     *
     * @route GET /demo3
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
     * @param string    $p13  p13 {@rule length=6}
     * @param int       $p14  p14 {@rule min=1|max=6}
     */
    public function demo3($p1, $p2, $p3, $p4, $p5, $p6, $p7, $p8, $p9, $p10, $p11, $p12, $p13, $p14) {
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
            'p13' => $p13, // aaaaaa
            'p14' => $p14  // 4
        ];
        return $res;
    }
}
