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
     * @Inject("App.host")
     * @var string
     */  
    private $host;

    /**
     * @route GET /
     */
    public function index() 
    {
        echo $this->host;
        // $this->logger->error("Adding {username} a new user", ['username' => 'Seldaek']);
        return ApiResult::success('OK');
    }
}
