<?php
namespace App\Entity\Nested;

/**
 * 企业订单
 */
class Order
{
    /**
     * 订单ID
     * 
     * @var int
     */
    public $id;

    /**
     * 订单流水号
     * 
     * @var string
     * @rule length=8
     */
    public $code;

    /**
     * 信息
     * 
     * @var OrderInfo
     */
    public $orderInfo;

    /**
     * 其它
     * 
     * 嵌套实体数组
     * 
     * @var App\Entity\Nested\OrderOther[]
     */
    public $orderOthers;
}