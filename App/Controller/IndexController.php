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

    // /**
    //  * @route GET /
    //  * @param numeric $p1 电子邮箱
    //  * @param dateTime $p2
    //  */
    // public function index($p1, $p2) 
    // {
    //     // $this->logger->error("Adding {username} a new user", ['username' => 'Seldaek']);
    //     return ApiResult::success('OK');
    // }
}
