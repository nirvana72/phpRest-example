<?php
namespace App\Controller;

use Symfony\Component\HttpFoundation\Request;
use Example\Entity\User;

/**
 * @path /
 */
class IndexController
{
    /**
     * @route POST /
     * @param int[] $ids
     */
    public function index($ids) 
    {
        \PhpRest\dump($ids);
        return 'OK';
    }
}
