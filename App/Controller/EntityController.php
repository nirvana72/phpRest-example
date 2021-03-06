<?php

// 实体类规范查看 App/Entity/User.php

namespace App\Controller;

use App\Entity\Nested\Company;
use App\Entity\Nested\Employee;
use App\Entity\Info;
use App\Entity\User;

/**
 * 请求数据绑定实体类
 * 
 * @path /entity
 */
class EntityController
{
    /**
     * demo1
     * 
     * @route POST /demo1
     * @param \App\Entity\User $user
     */
    public function demo1(User $user) 
    {
        //  客户端提交数据:
        //  {
        //     "user": {
        //         "id": 1
        //         "name": "jack",
        //         "age": 18
        //     }
        //  }
        //
        // 绑定实体类可以分别在两个地方指定
        // 1. function(实体类型 $xxx)
        // 2. @param 实体类型 $xxx
        // 
        // 任何一处指定后, 方法参数都为一个实体类型
        // 否则, 虽然也能绑定request 数据, 但得到的是一个关联数组
        // 
        // 推荐使用方法 1. 绑定, 当然更推荐两个地方都写，增加代码可读性 :)
        // 因为直接在 function 上指定, PHP语言特性会直接识别为一个实体类, 
        // 不会再解析 @param 中的内容, @param 中写不写, 或写不写全命名空间都无所谓, 只会判断类型是否一至
        // 否则若只在 @param 中指定的话, 会多执行一个解析过程
        // 
        // 如果只在 @param 中指定，也推荐写全命名空间, 这样只有一个判断 class_exists('\Entity\User')
        // 否则如果只写 User, 还会多一个结合上下文的反射命名空间过程
        
        return $user;
    }

    /**
     * demo2
     * 
     * @route POST /demo2
     * @param $user
     */
    public function demo2($user) 
    {
        //  客户端提交数据:
        //  {
        //     "user": {
        //         "id": 1
        //         "name": "jack",
        //         "age": 18
        //     }
        //  }
        // 
        // 两处都不指定实体类也可以得到request数据,  
        // 但user只是个array, 并不是一个实体类
        // 同时也无法使用框架验证规则，只能在业务代码里验证
        \PhpRest\dump($user);
        return 'OK';
    }

    /**
     * demo3
     * 
     * @route POST /demo3
     * @param \App\Entity\User $user {@bind request.user}
     * @param \App\Entity\Info $info {@bind request.info}
     */
    public function demo3(User $user, Info $info) 
    {
        //  客户端提交数据:
        //  {
        //     "user": {
        //         "id": 1
        //         "name": "jack",
        //         "age": 18
        //     },
        //     "info": {
        //         "id": 1
        //         "email": "xxx"
        //     }
        //  }
        // 
        // 因为默认 @bind request.xxx 同名参数名
        // 所以 {@bind request.user} 写不写都一样
        // 除非  @param $dog {@bind request.user}
        \PhpRest\dump($user);
        \PhpRest\dump($info);
        return 'OK';
    }

    /**
     * demo4
     * 
     * 实体类嵌套实体类, 嵌套实体类数组, 嵌套基础类型数组
     * 
     * @route POST /demo4
     * @param \App\Entity\Nested\Company $company
     */
    public function demo4(Company $company) 
    {
        //  客户端提交数据:
        //  {
        //     "company": {
        //        "id": 1,
        //        "name": "xxxx公司",
        //        "employee": {
        //             "id": 1
        //            "realName": "jack",
        //             "companyId": 18
        //        },
        //         "order": {
        //             "id": 1,
        //            "code": "1231214351",
        //            "orderInfo": {
        //                "id": 123,
        //                 "desc": "info desc"
        //             },
        //             "orderOthers": [
        //                  {
        //                      "id": 1,
        //                      "ips": ['127.0.0.1', '127.0.0.2', '127.0.0.3'],
        //                      "nums": [1,2,3],
        //                 },
        //                  {
        //                     "id": 2,
        //                      "ips": ['127.0.1.1', '127.0.2.2'],
        //                     "nums": [1,2,3,4,5,6],
        //                 }
        //             ]
        //         }
        //     }
        //  }
        // 
        \PhpRest\dump($company);
        return 'OK';
    }

    /**
     * demo5
     * 
     * 绑定到实体类数组, 使用场景通常应该都是POST吧
     * 
     * @route POST /demo5
     * @param \App\Entity\User[] $users
     */
    public function demo5($users) 
    {
        //  客户端提交数据:
        //   {
        //     "users": [
        //         {
        //             "id": 1,
        //             "name": "aaa",
        //             "age": 16
        //         },
        //         {
        //             "id": 2,
        //             "name": "bbb",
        //             "age": 17
        //         },
        //         {
        //             "id": 3,
        //             "name": "ccc",
        //             "age": 18
        //         }
        //     ]
        // }
        // 
        \PhpRest\dump($users);
        return 'OK';
    }

    /**
     * demo6
     * 
     * 实体类支持继承 ObjSon 继承于 ObjFather
     * 
     * @route POST /demo6
     * @param \App\Entity\Inherit\ObjSon $son
     */
    public function demo6($son) 
    {
        //  客户端提交数据:
        //   {
        //     "son": {
        //         "id": 1,
        //         "name": "aaa",
        //         "age": 16
        //     }
        // }
        // 
        \PhpRest\dump($son);
        return 'OK';
    }
}
