<?php

use PhpRest\Application;
use PhpRest\Utils\EnvHelper as Env;

require __DIR__.'/../vendor/autoload.php';
require '/workspace/phpRest/vendor/autoload.php';

// 加载配置
$app = Application::create(__DIR__.'/../config/config.php');

// $app->get('\PhpRest\Test\ControllerBuildTest')->test1(); exit;
// $app->get('\PhpRest\Test\EntityBuildTest')->test2(); exit;

// 加载路由
$app->scanRoutesFromPath( __DIR__.'/../App/Controller', 'App\Controller');

// swagger
// if (Env::get('app.env') !== 'production') {
//     \PhpRest\Swagger\SwaggerHandler::register($app, 'App\Controller', function(&$swagger, $group) {
//             $api_key['type'] = 'apiKey';
//             $api_key['in']   = 'header';
//             $api_key['name'] = Env::get('jwt.name');
//             $swagger['securityDefinitions']['api_key'] = $api_key;
//         }
//     );
// }

// 解析请求
$app->dispatch();