<?php
namespace Example\Controller;

use Example\Entity\Company;
use Example\Entity\Employee;
use Example\Entity\Order;
use Example\Entity\User;

/**
 * 实体类入参绑定
 * 
 * @path /entity
 */
class EntityController
{
    /**
     * demo1
     * 
     * @route POST /demo1
     * @param \Example\Entity\User $user
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
        // 否则, 虽然也能绑定request 数据, 但得到的是一个数组
        // 
        // 推荐使用方法 1. 绑定
        // 因为直接在 function 上指定, PHP语言特性会直接识别为一个实体类, 
        // 不会再解析 @param 中的内容, @param 中写不写, 或写不写全命名空间都无所谓, 只会判断描述是否一至
        // 否则若只在 @param 中指定的话, 会多执行一个解析过程
        // 
        // 如果只在 @param 中指定，也推荐写全命名空间, 这样只判断 class_exists 
        // 否则如果只写 User, 还会多一个结合上下文的反射命名空间过程
        // 
        // 实体类参数验证规则查看 Example/Entity/User.php
        \PhpRest\dump($user);
        return 'OK';
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
     * @param \Example\Entity\User $user {@bind request}
     */
    public function demo3(User $user) 
    {
        //  客户端提交数据:
        //  {
        //      "id": 1
        //      "name": "jack",
        //      "age": 18
        //  }
        // 
        // 如果希望把整个 request 提交对象绑定成一个实体 需要 {@bind request}
        \PhpRest\dump($user);
        return 'OK';
    }

    /**
     * demo4
     * 
     * @route POST /demo4
     * @param \Example\Entity\User  $user  {@bind request.user}
     * @param \Example\Entity\Order $order {@bind request.order}
     */
    public function demo4(User $user, Order $order) 
    {
        //  客户端提交数据:
        //  {
        //     "user": {
        //         "id": 1
        //         "name": "jack",
        //         "age": 18
        //     },
        //     "order": {
        //         "id": 1
        //         "code": "xxx"
        //     }
        //  }
        // 
        // 因为默认 @bind request.xxx 同名参数名
        // 所以 {@bind request.user} 写不写都一样
        // 除非  @param \Example\Entity\User $xxx {@bind request.user}
        \PhpRest\dump($user);
        \PhpRest\dump($order);
        return 'OK';
    }

    /**
     * demo5
     * 
     * 实体类嵌套实体类
     * 
     * @route POST /demo5
     * @param \Example\Entity\Company $company {@bind request}
     */
    public function demo5(Company $company) 
    {
        //  客户端提交数据:
        //  {
        //     "id": 1
        //     "name": "xxxx公司"
        //     "employee": {
        //         "id": 1
        //         "realName": "jack",
        //         "companyId": 18
        //     },
        //     "order": {
        //         "id": 1
        //         "code": "1231214351"
        //     }
        //  }
        // 
        \PhpRest\dump($company);
        return 'OK';
    }

    /**
     * demo6
     * 
     * 提交数组绑定到实体类数组, 使用场景通常应该都是POST吧
     * 
     * @route POST /demo6
     * @param \Example\Entity\User[] $users
     */
    public function demo6($users) 
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

        // 如果是基础数据类型的数组
        // @param int[]    $ids
        // @param string[] $names
        // 其实基础数据类型数组写不写[] 都一样，因为PHP本身就是弱类型
        // 但是写上 [], 会上代码可读性更高一点
        // 
        // * 基础数据类型数组参数不支持验证规则
        // * 因为判断太烦了，要多写好多代码，还是在业务代码中判断吧
        \PhpRest\dump($users);
        return 'OK';
    }
}
