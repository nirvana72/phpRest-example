<?php
namespace App\Controller;

use PhpRest\ApiResult;

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
        return ApiResult::success('OK');
    }
}
