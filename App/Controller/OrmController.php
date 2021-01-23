<?php

// phpRest 支持最基本的ORM操作
// Orm 实体类参见 \Example\Entity\Orm\User.php

// 如果业务够简单(单表), 利用ORM确实可以少写很多代码, 看上去也更优雅
// 但是PHP特点没什么必要重度使用ORM

// 使用注意
// 1.  以下代码两种写法都可以正常插入数据库， 但 1 无法使用orm实体的验证规则
//     $user = new User();
//     $user->userId    = 1;
//     $user->account   = 'nirvana72';
//     $user->nickName  = 'nijia';
//     $user->password  = '123qwe@@';
//     $user->phone     = '13913181371';
//     $user->writeTime = date('Y-m-d H:i:s');
//     $user->insert();

//     以下代码可使orm的验证规则生效
//     $user = new User();
//     $user->fill([
//         'userId'    => 1,
//         'account'   => 'nirvana72',
//         'nickName'  => 'nijia',
//         'password'  => '123qwe@@',
//         'phone'     => '13913181371',
//         'writeTime' => date('Y-m-d H:i:s'),
//     ])->insert();

//     具体使用哪种方式，视应场景决定

// 2.  orm 只支持findOne, 不支持findList
//     因为如果是给前端数据返回， 直接返回关联数组也是一样的，反正最后都是json_encode， 大数组转换成实体对象数组也是个不小的消耗
//     貌似也很少有需要获取实体数组的使用场景， 如果真有，循环 entity->fill($data) 也一样
//     主要是复杂的SQL查询，ORM实现也太难了，我写不了
   
namespace App\Controller;

use PhpRest\ApiResult;
use App\Entity\Orm\User;

/**
 * ORM
 * 
 * @path /orm
 */
class OrmController
{
    /**
     * getById
     * 
     * @route GET /{userId}
     */
    public function getById(int $userId) 
    {        
        $user = User::findOne(['user_id' => $userId]);
        return ApiResult::success($user);
    }

    /**
     * create
     * 
     * @route POST /
     * @param User $user
     */
    public function create(User $user) 
    {
        $res = $user->insert();
        return ApiResult::success(['rowCount' => $res->rowCount(), 'userId' => $user->userId]);
    }

    /**
     * update
     * 
     * @route PUT /
     * @param User $user
     */
    public function update(User $user) 
    { 
        $res = $user->update();
        return ApiResult::assert($res->rowCount() === 1, ['', '保存失败']);
    }

    /**
     * delete
     * 
     * @route DELETE /{userId}
     */
    public function delete(int $userId) 
    { 
        // 也可以
        // $user = new User();
        // $user->userId = $userId;
        // $res = $user->remove();
        // 
        $res = User::delete(['user_id' => $userId]);
        return ApiResult::assert($res->rowCount() === 1, ['', '删除失败']);
    }
}
