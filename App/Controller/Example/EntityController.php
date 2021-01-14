<?php
namespace App\Controller\Example;

use App\Entity\User;

/**
 * Index
 */
class EntityController
{
    /**
     * test
     *
     * @route POST /test
     * @param User $user user {@bind request.user}
     */
    public function test(User $user) 
    {
        return $user;
    }
}
