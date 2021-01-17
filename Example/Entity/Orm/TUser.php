<?php

// 其实只要按着规范来，大多数的代码都可以省略 

namespace Example\Entity\Orm;

use PhpRest\Orm\EnableOrm;

class TUser
{
    use EnableOrm;

    /**
     * @pk
     * @auto
     */
    public $userId;

    public $account;

    public $nickName;

    public $password;
    
    public $phone;

    public $writeTime;
}