<?php

use PhpRest\Application;
use PhpRest\Utils\EnvHelper as Env;

require __DIR__.'/../vendor/autoload.php';
require '/workspace/phpRest/vendor/autoload.php';

// 加载配置
$app = Application::createDefault(__DIR__.'/../config/config.php');

// $app->get('\PhpRest\Test\ControllerBuildTest')->test1(); exit;
// $app->get('\PhpRest\Test\EntityBuildTest')->test2(); exit;

// 加载路由
$app->scanRoutesFromPath( __DIR__.'/../App/Controller', 'App\Controller');

// 跨域支持
$app->addGlobalHooks([ 
    \PhpRest\Hook\CrosHook::class 
]);

// swagger
if (Env::get('app.env') !== 'production') {
    $swaggerGroup = ['demo' => 'App\Controller' ];
    \PhpRest\Swagger\SwaggerHandler::register($app, $swaggerGroup, function($swagger, $group) {
            $api_key['type'] = 'apiKey';
            $api_key['in']   = 'header';
            $api_key['name'] = Env::get('jwt.name');
            $swagger['securityDefinitions']['token'] = $api_key;
        }
    );
}

// 解析请求
$app->dispatch();