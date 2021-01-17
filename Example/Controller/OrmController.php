<?php

// phpRest 支持最基本的ORM操作

// 如果业务够简单(单表), 利用ORM确实可以少写很多代码, 看上去也更优雅
// 但是PHP特点没什么必要重度使用ORM

// 使用注意
// 1.  orm 实体对象只能通过 $app->make() 创建， new 出来的无法生效
//     因为orm对象内部需要注入一些必要对象

// 2.  以下代码可以正常插入数据库， 但无法使用orm实体的验证规则
//     $user = $this->app->make(User::class);
//     $user->userId    = 1;
//     $user->account   = 'nirvana72';
//     $user->nickName  = 'nijia';
//     $user->password  = '123qwe@@';
//     $user->phone     = '13913181371';
//     $user->writeTime = date('Y-m-d H:i:s');
//     $user->insert();

//     以下代码可使orm的验证规则生效
//     $user->fill([
//         'userId'    => 1,
//         'account'   => 'nirvana72',
//         'nickName'  => 'nijia',
//         'password'  => '123qwe@@',
//         'phone'     => '13913181371',
//         'writeTime' => date('Y-m-d H:i:s'),
//     ])->insert();

//     具体使用哪种方式，视应场景决定

// 3.  orm 只支持findOne, 不支持findList
//     因为如果是给前端数据返回， 直接返回关联数组也是一样的，反正最后都是json_encode， 大数组转换成实体对象数组也是个不小的消耗
//     貌似也很少有需要获取实体数组的使用场景， 如果真有，循环 entity->fill($data) 也一样
//     主要是复杂的SQL查询，ORM实现也太难了，我写不了
   
namespace Example\Controller;

use PhpRest\ApiResult;
use Example\Entity\Orm\User;

/**
 * ORM1
 * 
 * @path /orm1
 */
class OrmController
{
    /**
     * @Inject
     * @var \PhpRest\Application
     */
    private $app;

    /**
     * getById
     * 
     * @route GET /{userId:\d+}
     */
    public function getById($userId = 1) 
    {        
        $user = $this->app->make(User::class);
        $user->findOne(['user_id' => $userId]);
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
        $ret = $user->insert();
        return ApiResult::success(['userId' => $ret->id()]);
    }

    /**
     * update
     * 
     * @route PUT /
     * @param User $user
     */
    public function update(User $user) 
    { 
        $ret = $user->update();
        return ApiResult::assert($ret->rowCount() === 1, '保存失败');
    }

    /**
     * delete
     * 
     * @route DELETE /{userId:\d+}
     */
    public function delete($userId) 
    { 
        $user = $this->app->make(User::class);
        $ret = $user->delete(['user_id' => $userId]);
        return ApiResult::assert($res->rowCount() === 1, '删除失败');
    }
}
