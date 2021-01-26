<?php

// 其实只要按着规范来，大多数的代码都可以省略 

namespace App\Entity\Orm;

use PhpRest\Orm\EnableOrm;

class TUser
{
    use EnableOrm;

    /**
     * @pk auto
     */
    public int $userId;

    public string $account;

    public string $nickName;

    public string $password;
    
    public string $phone;

    public string $writeTime;
}