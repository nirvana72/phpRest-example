<?php

use PhpRest\Application;

require __DIR__.'/../vendor/autoload.php';
require '/workspace/phpRest/vendor/autoload.php';

// 加载配置
$app = Application::createDefault(__DIR__.'/../config/config.php');

// 加载路由
$app->loadRoutesFromPath( __DIR__.'/../App/Controller', 'App\\Controller');

// 执行请求
$app->dispatch();