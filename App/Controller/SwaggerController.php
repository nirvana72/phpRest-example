<?php

// PhpRest 注解规则，默认已支持生成swagger文档
// 如果你希望swagger文档展示效果更加完善
// 那么请参考 IndexController.php 的格式
//
// 由于PHP的函数 不像java,.net 之类语言有明确返回值类型
// 所以无法自动获知函数具体会返回什么值
// 如果你希望 swagger 能展示一个友好的return值， 需要增加 @return 注解
// @return 注解只对Swagger文档生效，与业务逻辑没有任何关联
//
// * 返回josn字符串需要注意的地方
//   必须用双引号
//   必须是个格式正式的json字符串
//   检查中文 : 中文 ， 经常会忽略
//
// 如果你希望某个api不在swagger中展示，比如test接口...
// 可以添加一个@swagger false 注解

namespace App\Controller;

/**
 * SwaggerController摘要
 * 
 * 控制器描述。。。。。
 * 
 * @path /swagger
 */
class SwaggerController
{
    /**
     * demo1
     * 
     * 展示一个友好的swagger接口
     * 
     * @route GET /demo1
     * @param int    $p1 p1描述
     * @param string $p2 p2描述 
     * @return void
     */
    public function demo1($p1, $p2 = 'p2') 
    {
        return 'string';
    }

    /**
     * @route GET /demo2
     */
    public function demo2(int $p1, $p2 = 'p2') 
    {
        // 如果不考虑swagger文档, demo1 和 demo2 是一样的.
        return 'string';
    }


    /**
     * 指定swagger返回格式
     * 
     * @route GET /demo3
     * @return object {
     *   "name": "jack",
     *   "age": 18
     * }
     */
    public function demo3() 
    {
        // @return 支持的写法有

        // @return int
        // @return int[]

        // @return float
        // @return float[]

        // @return string
        // @return string[]

        // 返回手写对象
        // @return object {
        //     "name": "jack",
        //     "age": 18,
        //     "info": [
        //         {
        //             "aaa": "string",
        //             "bbb": [1]
        //         }
        //     ]
        // }
        // 对象数组
        // @return object[] { ... }

        // 实体映射
        // @return App\Entity\User
        // @return App\Entity\User[]

        return ['name' => 'jack', 'age' => 18];
    }

    /**
     * 返回格式使用模版
     * 
     * @route GET /demo4
     * @return App\Entity\User #template=default
     */
    public function demo4() 
    {        
        // swagger 返回展示
        // {
        //    "ret": 1,
        //    "msg": "success",
        //    "data" : {
        //       "name": "string",
        //       "age": 18
        //    }
        //  }

        // 关于模版格式查看 config.php 文件

        // 更多模板写法
        // @return int #template=pager
        // @return App\Entity\User[] #template=default
        // @return object { ... } #template=pager
        // ...
        return 1;
    }
}
