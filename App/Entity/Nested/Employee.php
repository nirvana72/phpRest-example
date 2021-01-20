<?php
namespace App\Entity\Nested;

/**
 * 企业员工
 */
class Employee
{
    /**
     * 员工ID
     * 
     * @var int
     */
    public $id;

    /**
     * 员工名称
     * 
     * @var string
     */
    public $realName;

    /**
     * 企业ID
     * 
     * @var int
     */
    public $companyId;
}