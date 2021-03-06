<?php
namespace App\Entity\Nested;

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
     * @var App\Entity\Nested\Employee
     */
    public $employee;

    /**
     * 订单
     * 
     * 订单中又嵌套子类
     * 
     * @var App\Entity\Nested\Order
     */
    public $order;
}