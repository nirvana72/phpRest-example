<?php
namespace App\Entity;

/**
 * 用户
 * 
 * 用户表描述用户表描述用户表描述用户表描述
 * 
 * @table sys_user
 */
class User
{
    /**
     * 用户ID
     * @field user_id@auto
     * @rule min=1|max=100
     * @var int
     */
    public $id = 1;

    /**
     * 用户名
     * @field user_name
     * @rule required
     * @var slug
     */
    public $name;

    public $order;
}