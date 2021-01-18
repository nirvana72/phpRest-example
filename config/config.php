<?php
use Psr\Container\ContainerInterface;

return [
    'App.name' => 'example',

    'env' => 'develop',
    
    /************************************************************************************
      Mysql
    ************************************************************************************/
    'database' => [ // see https://medoo.in/doc
        'database_type' => 'mysql',
        'database_name' => 'freight-saas',
        'server' => '172.18.0.2',
        'username' => 'root',
        'password' => '123456',
        'option' => [  // see https://www.php.net/manual/zh/book.pdo.php
            \PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC,
            \PDO::ATTR_EMULATE_PREPARES => false,
            \PDO::MYSQL_ATTR_INIT_COMMAND => "SET NAMES'utf8';"            
        ]
    ],

    /************************************************************************************
      DEBUG     (100)  : 详细的debug信息。
      INFO      (200)  : 关键事件。
      NOTICE    (250)  : 普通但是重要的事件。
      WARNING   (300)  : 出现非错误的异常。
      ERROR     (400)  : 运行时错误，但是不需要立刻处理。
      CRITICA   (500)  : 严重错误。
      EMERGENCY (600)  : 系统不可用
    ************************************************************************************/
    \Psr\Log\LoggerInterface::class => DI\factory(function (ContainerInterface $c) {
        // 默认日志路径在此修改  
        $logPath = $_SERVER['DOCUMENT_ROOT'] . '/../logs/' . date("Y-m-d") . '.txt';
        $dateFormat = "Y-m-d H:i:s";
        $output = "%datetime% > %level_name% > %message% %context% %extra%\n";
        $formatter = new \Monolog\Formatter\LineFormatter($output, $dateFormat);
        $stream = new \Monolog\Handler\StreamHandler($logPath, \Monolog\Logger::ERROR );
        $stream->setFormatter($formatter);
        $monoLog = new \Monolog\Logger($c->get('App.name'));
        $monoLog->pushHandler($stream);
        return $monoLog;
    }),
];