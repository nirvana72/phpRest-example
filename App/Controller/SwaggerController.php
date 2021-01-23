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
     * @return object {
     *      "uid": 1,
     *      "uname": "string"
     * }
     */
    public function demo1($p1, $p2 = 'p2') 
    {
        return ['uid' => 1, 'uname' => 'aaa'];
    }

    /**
     * @route POST /demo2
     * @return void
     */
    public function demo2() 
    {
        // swagger 返回展示
        //  {
        //    "ret": 1,
        //    "msg": "success"
        //  }
        return 'OK';
    }

    /**
     * @route GET /demo3
     * @return number
     */
    public function demo3() 
    {
        // swagger 返回展示
        // {
        //    "ret": 1,
        //    "msg": "success",
        //    "data" : 1
        //  }
        return "OK";
    }

    /**
     * @route GET /demo4
     * @return number[]
     */
    public function demo4() 
    {
        // swagger 返回展示
        //  {
        //    "ret": 1,
        //    "msg": "success",
        //    "data" : [1]
        //  }
        return "OK";
    }

    /**
     * @route GET /demo5
     * @return string
     */
    public function demo5() 
    {
        // swagger 返回展示
        //  {
        //    "ret": 1,
        //    "msg": "success",
        //    "data": "string" 
        //  }
        return "OK";
    }

    /**
     * @route GET /demo6
     * @return string[]
     */
    public function demo6() 
    {
        // swagger 返回展示
        //  {
        //    "ret": 1,
        //    "msg": "success",
        //    "data": ["string"] 
        //  }
        return "OK";
    }

    /**
     * @route GET /demo7
     * @return object {
     *    "name": "string",
     *    "nick": "昵称",
     *    "age": 1
     * }
     */
    public function demo7() 
    {
        // swagger 返回展示
        //  {
        //    "ret": 1,
        //    "msg": "success",
        //    "data": {
        //        "name": "string",
        //        "nick": "昵称",
        //        "age": 1
        //    }
        //  }
        return "OK";
    }

    /**
     * @route GET /demo8
     * @return object[] {
     *    "name": "string",
     *    "nick": "昵称",
     *    "age": 1
     * }
     */
    public function demo8() 
    {
        // swagger 返回展示
        //  {
        //    "ret": 1,
        //    "msg": "success",
        //    "data": [
        //        {
        //            "name": "string",
        //            "nick": "昵称",
        //            "age": 1
        //        }
        //     ]
        //  }
        return "OK";
    }

    /**
     * @route GET /demo9
     * @return \App\Entity\User
     */
    public function demo9() 
    {
        // 同时支持实体类返回
        // 
        // swagger 返回展示
        //  {
        //    "ret": 1,
        //    "msg": "success",
        //    "data": {
        //       "id": "string",
        //       "name": "string",
        //       "info": "string [email]"
        //     }
        //  }
        return "OK";
    }

    /**
     * @route GET /demo10
     * @return \App\Entity\User[]
     */
    public function demo10() 
    {
        // 返回实体类也支持数组
        // 
        // swagger 返回展示
        //  {
        //    "ret": 1,
        //    "msg": "success",
        //    "data": [{
        //       "id": "string",
        //       "name": "string",
        //       "info": "string [email]"
        //     }]
        //  }
        return "OK";
    }

    /**
     * @route GET /demo11
     * @return _object {
     *    "code": 1
     * }
     */
    public function demo11() 
    {
        // @return 注解默认会在外面套一层 { "ret": 1, "msg": "success", data: "xxx" }
        // 如果某些接口返回不想有这层, 只要在返回对象前加下划线 _
        // 
        // 支持 _number, _string, _string[],  _\Example\Entity\User
        //
        // swagger 返回展示
        //  {
        //    "code": 1
        //  }
        return "OK";
    }
}
