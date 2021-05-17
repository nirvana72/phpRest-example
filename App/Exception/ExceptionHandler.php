<?php
namespace App\Exception;

use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\HttpKernel\Exception\HttpException;
use PhpRest\Application;
use PhpRest\Exception\ExceptionHandlerInterface;
use PhpRest\Exception\BadArgumentException;
use PhpRest\Exception\BadCodeException;
use PhpRest\Exception\BadRequestException;
use PhpRest\ApiResult;

class ExceptionHandler implements ExceptionHandlerInterface
{
    /**
     * @Inject
     * @var \Psr\Log\LoggerInterface
     */  
    private $logger;

    /**
     * @param \Throwable $e
     * @return Response
     */
    public function render(\Throwable $e): Response
    {
        $response = Application::getInstance()->make(Response::class);
        // $ret = 0 - abs($e->getCode());
        $result = new ApiResult(-1, $e->getMessage());

        if($e instanceof BadCodeException){
            $file = $e->getFile();
            $line = $e->getLine();
            $this->logger->error("{$file} - line:{$line}");
            $this->logger->error($e->getMessage());
        } elseif($e instanceof HttpException){
            $response->setStatusCode($e->getStatusCode());
        }
        
        $message = json_encode($result, JSON_PRETTY_PRINT | JSON_UNESCAPED_SLASHES | JSON_UNESCAPED_UNICODE);
        $response->setContent($message);
        $response->headers->set('Content-Type', 'application/json');
        return $response;
    }
}