<?php
namespace Example\Entity;

/**
 * 企业
 */
class Company
{
    /**
     * 企业ID
     * 
     * @var int
     * @rule  min=1|max=100
     */
    public $id;

    /**
     * 企业名称
     * 
     * @var string
     */
    public $name;

    /**
     * 员工
     * 
     * @var Example\Entity\Employee
     */
    public $employee;

    /**
     * 订单
     * 
     * @var Example\Entity\Order
     */
    public $order;
}