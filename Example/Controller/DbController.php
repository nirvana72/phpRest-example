<?php

// 数据库操作，无非就是各种花式拼接SQL， 就看谁拼的更优雅
// github上优秀的轮子太多了， 没必要重复造轮子
// 所以 phpRest 使用 \Medoo\Medoo

// see https://medoo.in/doc

namespace Example\Controller;

use PhpRest\ApiResult;

/**
 * 数据库操作
 * 
 * @path /db
 */
class DbController
{

    /**
     * @Inject
     * @var \Medoo\Medoo
     */
    private $db;

    /**
     * getById
     * 
     * @route GET /find/{userId}
     */
    public function getById(int $userId) 
    {
        // $row = $this->db->get('t_user', '*', ['user_id' => $userId]);
        // $row = \PhpRest\camelizeArrayKey($row); // 把数据库里的下划线规则转成驼峰规则
        // return ApiResult::success($row);
    }

    /**
     * getList
     * 
     * @route GET /list
     * @param int $page
     * @param int $limit
     */
    public function getList(int $page = 1, int $limit = 10) 
    {        
        $start = ($page-1) * $limit;
        $rows = $this->db->select('t_user', '*', ['LIMIT' => [$start, $limit]]);
        $rows = \PhpRest\camelizeArrayKey($rows);
        return ApiResult::success($rows);
    }

    /**
     * create
     * 
     * @route POST /
     * @param slug   $account
     * @param string $nickName
     * @param string $phone    {@rule regex=/^1[3456789]\d{9}$/}
     * @param string $password {@rule lengthBetween=6,20}
     */
    public function create($account, $phone, $nickName, $password) 
    { 
        $data = [
            'account'    => $account,
            'phone'      => $phone,
            'nick_name'  => $nickName,
            'password'   => $password,
            'write_time' => date('Y-m-d H:i:s')
        ];
        $res = $this->db->insert('t_user', $data);
        return ApiResult::assert($res->rowCount() === 1, ['', '添加失败']);
    }

    /**
     * update
     * 
     * @route PUT /
     * @param int    $userId
     * @param string $nickName
     * @param string $phone    {@rule regex=/^1[3456789]\d{9}$/}
     */
    public function update($userId, $nickName, $phone) 
    { 
        $this->db->update('tmp_user', [
            'nick_name'  => $nickName,
            'phone'      => $phone
        ], [
            'user_id' => $userId
        ]);
        return ApiResult::success();
    }

    /**
     * delete
     * 
     * @route DELETE /{userId:\d+}
     */
    public function delete($userId) 
    { 
        $res = $this->db->delete('tmp_user', ['user_id' => $userId]);
        return ApiResult::assert($res->rowCount() === 1, ['', '删除失败']);
    }
}
