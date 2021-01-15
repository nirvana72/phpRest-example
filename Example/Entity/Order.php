<?php
namespace Example\Entity;

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
     * @var Info
     */
    public $info;
}