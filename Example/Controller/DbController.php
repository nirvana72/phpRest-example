<?php

// DROP TABLE IF EXISTS `tmp_user`;
// CREATE TABLE `tmp_user`  (
//   `user_id` int(11) NOT NULL AUTO_INCREMENT,
//   `account` varchar(16) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL,
//   `nick_name` varchar(16) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL,
//   `password` varchar(16) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL,
//   `phone` varchar(16) CHARACTER SET utf8 COLLATE utf8_general_ci NULL DEFAULT NULL,
//   `write_time` char(19) CHARACTER SET utf8 COLLATE utf8_general_ci NULL DEFAULT NULL,
//   PRIMARY KEY (`user_id`) USING BTREE
// ) ENGINE = InnoDB AUTO_INCREMENT = 1 CHARACTER SET = utf8 COLLATE = utf8_general_ci ROW_FORMAT = Dynamic;

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
