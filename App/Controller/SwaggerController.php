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
// 可以添加一个@swagger hide 注解


// 如果需要增加swagger的security登录验证, 需要添加以下几步
// 1. 增加config中的swagger配置
// 'swagger' => [
//   ...
//   'security' => true,
//   ...
// ],

// 2. 加了以上配置，所有接口默认都需要 security 验证
//    如有例外接口, 在function上添加经下注解
//    @swagger !security

// 3. securityDefinitions 默认配置为
//     api_key:
//       type: apiKey
//       name: Authorization
//       in: header
//   如需修改, 则在/public/index.php 中修改
//   SwaggerHandler::register('/swagger/api.json', function(&$swagger) {
//       $swagger['info']['description'] = 'phpRest-admin 系统API';
//       $swagger['securityDefinitions']['api_key']['name'] = 'token';
//   });

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
        //     "ret": 1,
        //     "msg": "success",
        //     "data": {
        //         "name": "jack",
        //         "age": 18,
        //         "info": [
        //             {
        //                 "aaa": "string",
        //                 "bbb": [1]
        //             }
        //         ]    
        //     }      
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
     * @return \App\Entity\User #template=pager
     */
    public function demo4() 
    {        
        // swagger 返回展示
        // {
        //    "ret": 1,
        //    "msg": "success",
        //    "data" : {
        //       "total": 1,
        //       "list": [
        //         ...
        //       ]
        //    }
        //  }

        // 关于模版格式查看 config.php 文件

        // 更多模板写法
        // @return int #template=default  // 默认会使用default模版，#template=default 可以省略
        // @return App\Entity\User[] #template=pager
        // @return object { ... } #template=pager
        // ...
        return 1;
    }

    /**
     * 不使用模版
     * 
     * @route GET /demo5
     * @return int #template=null
     */
    public function demo5() 
    {
        // 框架自动会应用config中配置的swagger default 模版， 除非没定义default
        // 如果不希望返回内容应用任何模版， 使用 #template=null
        return 1;
    }
}
