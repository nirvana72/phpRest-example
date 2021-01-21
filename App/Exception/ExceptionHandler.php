<?php
namespace App\Exception;

use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\HttpKernel\Exception\HttpException;
use PhpRest\Exception\ExceptionHandlerInterface;
use PhpRest\Exception\BadArgumentException;
use PhpRest\Exception\BadCodeException;
use PhpRest\Exception\BadRequestException;
use PhpRest\ApiResult;

class ExceptionHandler implements ExceptionHandlerInterface
{
    /**
     * @param \Throwable $e
     * @return Response
     */
    public function render(\Throwable $e)
    {
        $ret = 0 - abs($e->getCode()); // 保证返回值 <= 0
        $result = new ApiResult($ret, $e->getMessage());
        $status = Response::HTTP_INTERNAL_SERVER_ERROR; // 500

        if($e instanceof BadArgumentException){
            $status = Response::HTTP_BAD_REQUEST; // 400
        } elseif($e instanceof BadCodeException){
            $status = Response::HTTP_INTERNAL_SERVER_ERROR; // 500
        } elseif($e instanceof BadRequestException){
            $status = Response::HTTP_NOT_FOUND; // 404
        } elseif($e instanceof AuthException){
            $status = Response::HTTP_FORBIDDEN; // 403
        } elseif($e instanceof HttpException){
            $status = $e->getStatusCode();
        }

        if($e->getFile() == __FILE__){
            $trace = $e->getTrace();
            $file = $trace[0]['file'];
            $line = $trace[0]['line'];
        }else{
            $file = $e->getFile();
            $line = $e->getLine();
        }

        // $wwwRoot = str_replace('/public', '', $_SERVER['DOCUMENT_ROOT']);
        // $file = str_replace($wwwRoot, '', $file);
        $file = end(explode('/', $file));
        $result->data = "{$file} - line:{$line}";

        $message = json_encode($result, JSON_PRETTY_PRINT | JSON_UNESCAPED_SLASHES | JSON_UNESCAPED_UNICODE);
        
        return new Response($message, $status, ['Content-Type'=>'application/json']);
    }
}