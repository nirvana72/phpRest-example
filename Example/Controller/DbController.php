<?php

// 数据库操作，无非就是各种花式拼接SQL， 就看谁拼的更优雅
// GITHUB上太多现成的轮子了， 也没必要自己再造轮子， 自己造的也不一定会比别人好
// 所以 phpRest 使用 \Medoo\Medoo

// see https://medoo.in/api/new

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
     * @route GET /{userId:\d+}
     */
    public function getById($userId = 1) 
    {        
        $row = $this->db->get('tmp_user', '*', ['user_id' => $userId]);
        $row = \PhpRest\camelizeArrayKey($row);
        return ApiResult::success($row);
    }

    /**
     * getList
     * 
     * @route GET /list
     * @param int $page
     * @param int $limit
     */
    public function getList($page = 1, $limit = 10) 
    {        
        $start = ($page-1) * $limit;
        $rows = $this->db->select('tmp_user', '*', ['limit' => [$start, $limit]]);
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
        $res = $this->db->insert('tmp_user', $data);
        return ApiResult::assert($res->rowCount() === 1, '添加失败');
    }

    /**
     * update
     * 
     * @route PUT /{userId:\d+}
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
        return ApiResult::assert($res->rowCount() === 1, '删除失败');
    }
}
