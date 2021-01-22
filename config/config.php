<?php

use Symfony\Component\HttpFoundation\Response;
use PhpRest\Exception\ExceptionHandlerInterface;
use Psr\Container\ContainerInterface;
use PhpRest\Utils\EnvHelper as Env;

Env::loadFile($_SERVER['DOCUMENT_ROOT'] . '/../.env');

return [
    'App.name'   => Env::get('app.name'),
    'App.host'   => Env::get('app.host'),
    'App.env'    => Env::get('app.env'),

    /************************************************************************************
      swagger
    ************************************************************************************/
    'swagger' => [
        'author'  => 'nijia',
        'email'   => '15279663@qq.com',
        'schemes' => ['http'],
        'version' => '1.0.1'
    ],
    
    /************************************************************************************
      Mysql
    ************************************************************************************/
    'database' => [ // see https://medoo.in/doc
        'database_type' => 'mysql',
        'database_name' => Env::get('database.dbname'),
        'server'   => Env::get('database.host'),
        'username' => Env::get('database.username'),
        'password' => Env::get('database.password'),
        'option' => [  // see https://www.php.net/manual/zh/book.pdo.php
            \PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC,
            \PDO::ATTR_EMULATE_PREPARES => false,
            \PDO::MYSQL_ATTR_INIT_COMMAND => "SET NAMES'utf8';"            
        ]
    ],

    /************************************************************************************
      跨域处理
    ************************************************************************************/
    Response::class => \DI\factory(function (ContainerInterface $c) {
        $response = new Response();
        $response->headers->set('Access-Control-Allow-Origin', '*');
        $response->headers->set('Access-Control-Allow-Headers', '*');
        $response->headers->set('Access-Control-Allow-Methods', '*');
        $response->headers->set('Access-Control-Allow-Credentials', 'true');
        return $response;
    }),

    /************************************************************************************
      自定义异常输出类
    /************************************************************************************/
    ExceptionHandlerInterface::class => \DI\autowire(\App\Exception\ExceptionHandler::class),

    /************************************************************************************
      日志输出
      DEBUG     (100)  : 详细的debug信息。
      INFO      (200)  : 关键事件。
      NOTICE    (250)  : 普通但是重要的事件。   
      WARNING   (300)  : 出现非错误的异常。
      ERROR     (400)  : 运行时错误，但是不需要立刻处理。
      CRITICA   (500)  : 严重错误。
      EMERGENCY (600)  : 系统不可用
    ************************************************************************************/
    \Psr\Log\LoggerInterface::class => \DI\factory(function (ContainerInterface $c) {
        // 默认日志路径在此修改  
        $logPath = $_SERVER['DOCUMENT_ROOT'] . '/../logs/' . date("Y-m-d") . '.txt';
        $dateFormat = "Y-m-d H:i:s";
        $output = "%datetime% > %level_name% > %message% %context% %extra%\n";
        $formatter = new \Monolog\Formatter\LineFormatter($output, $dateFormat);
        $stream = new \Monolog\Handler\StreamHandler($logPath, \Monolog\Logger::ERROR);
        $stream->setFormatter($formatter);
        $monoLog = new \Monolog\Logger($c->get('App.name'));
        $monoLog->pushHandler($stream);
        return $monoLog;
    }),
];