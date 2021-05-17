<?php

use PhpRest\Application;
use PhpRest\Swagger\SwaggerHandler;

require __DIR__.'/../vendor/autoload.php';

// 加载配置
$app = Application::create(__DIR__.'/../config/config.php');

// 加载路由
$app->scanRoutesFromPath(__DIR__.'/../App/Controller', 'App\Controller');

// 加载事件驱动 (如末使用事件驱动功能模块， 可删除)
$app->scanListenerFromPath(__DIR__.'/../App/Event', 'App\Event');

// swagger
SwaggerHandler::register('/swagger/api.json');

// 解析请求
$app->dispatch();