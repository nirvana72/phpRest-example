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
     * @route GET /
     */
    public function index() 
    {
        return 'OK';
    }
}
