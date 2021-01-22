<?php

use PhpRest\Application;
use PhpRest\Swagger\SwaggerHandler;

require __DIR__.'/../vendor/autoload.php';

// 加载配置
$app = Application::create(__DIR__.'/../config/config.php');

// 加载路由
$app->scanRoutesFromPath( __DIR__.'/../App/Controller', 'App\Controller');

// swagger
SwaggerHandler::register('/swagger/api.json');

// 解析请求
$app->dispatch();