<?php
namespace App\Entity\Nested;

class OrderOther
{
    /**
     * @var int
     */
    public $id;

    /**
     * 嵌套基础类型数组
     * 
     * @var ip[]
     */
    public $ips;

    /**
     * @var int[]
     */
    public $nums;
}