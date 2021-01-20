<?php

// 如果你使用Swagger展示你的API
// 那么可以增加一个 @return 注解, 展示API的返回说明
// @return 注解只对Swagger文档生效，与业务逻辑没有任何关联
//
// * 返回josn需要注意的地方
//   必须用双引号
//   必须是个格式正式的json字符串
//   检查中文 : 中文 ， 经常会忽略

namespace Example\Controller;

/**
 * @path /swagger
 */
class SwaggerRetrunController
{
    /**
     * @route POST /demo1
     * @return void
     */
    public function demo1() 
    {
        // swagger 返回展示
        //  {
        //    "ret": 1,
        //    "msg": "success"
        //  }
        return "OK";
    }

    /**
     * @route GET /demo2
     * @return number
     */
    public function demo2() 
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
     * @route GET /demo3
     * @return number[]
     */
    public function demo3() 
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
     * @route GET /demo4
     * @return string
     */
    public function demo4() 
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
     * @route GET /demo5
     * @return string[]
     */
    public function demo5() 
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
     * @route GET /demo6
     * @return object {
     *    "name": "string",
     *    "nick": "昵称",
     *    "age": 1
     * }
     */
    public function demo6() 
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
     * @route GET /demo7
     * @return object[] {
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
     * @route GET /demo8
     * @return \Example\Entity\User
     */
    public function demo8() 
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
     * @route GET /demo9
     * @return \Example\Entity\User[]
     */
    public function demo9() 
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
     * @route GET /demo10
     * @return _object {
     *    "code"： 1
     * }
     */
    public function demo10() 
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
