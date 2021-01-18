<?php
namespace App\Controller;

use PhpRest\ApiResult;

/**
 * @path /
 */
class IndexController
{
    /**
     * @Inject
     * @var \Psr\Log\LoggerInterface
     */  
    private $logger;

    /**
     * @Inject("App.host")
     * @var string
     */  
    private $host;

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
}
