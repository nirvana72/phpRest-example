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
     * @param string $p1
     * @param string $p2
     * @return _\Example\Entity\User[]
     */
    public function index($p1, $p2) 
    {
        // $this->logger->error("Adding {username} a new user", ['username' => 'Seldaek']);
        return ApiResult::success('OK');
    }
}
