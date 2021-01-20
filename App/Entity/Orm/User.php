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

namespace App\Entity\Orm;

use PhpRest\Orm\EnableOrm;

/**
 * @table t_user
 */
class User
{
    use EnableOrm; // 关键代码, 让实体类具有ORM功能，否则只是个普通实体类

    /**
     * @var int
     * @pk
     * @auto
     */
    public $userId;

    /**
     * @var slug
     * @rule lengthBetween=6,20
     */
    public $account;

    /**
     * @var string
     * @rule lengthBetween=6,20
     */
    public $nickName;

    /**
     * @var string
     */
    public $password;
    
    public $phone;

    public $writeTime;
}