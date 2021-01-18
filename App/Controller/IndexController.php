<?php
namespace App\Controller;

use PhpRest\ApiResult;

/**
 * @path /
 */
class IndexController
{
    /**
     * @Inject
     * @var \Psr\Log\LoggerInterface
     */  
    private $logger;

    /**
     * @route GET /
     */
    public function index() 
    {
        $this->logger->error("Adding {username} a new user", ['username' => 'Seldaek']);
        return ApiResult::success('OK');
    }
}
