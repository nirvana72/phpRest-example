# 运行 Run

~~~
git clone https://github.com/nirvana72/phpRest-example.git
cd 项目目录
composer install
~~~

# 目录结构
~~~
App                            // 业务代码
├── Controller                 // 控制器目录
│   ├── IndexController.php    // 控制器
│   └── ...
├── Entity                     // 实体类
│   └── ...
├── Exception                  // 异常处理目录
│   ├── ExceptionHandler.php   // 自定义异常处理文件
│   └── XXXException.php       // 自定义异常
│   └── ...
├── Hook                       // 中间件
│   ├── Hook1.php 
│   ├── Hook2.php 
│   └── ...
├── client                     // 简易axios 客户端
├── confing                    // 配置文件目录
├── logs                       // 日志文件目录
├── public                     
│   └── index.php              // 入口文件
└── .env                       // 环境配置文件
~~~

除了以下两个文件必需，其它都可以删除
~~~
App
├── Controller
│   └── IndexController.php
└── public                     
    └── index.php
~~~


# 说明直接看代码
[参数绑定](https://github.com/nirvana72/phpRest-example/blob/main/App/Controller/ParamsController.php)

[参数绑定实体类](https://github.com/nirvana72/phpRest-example/blob/main/App/Controller/EntityController.php)

[中间件hook](https://github.com/nirvana72/phpRest-example/blob/main/App/Controller/HookController.php)

[数据库操作](https://github.com/nirvana72/phpRest-example/blob/main/App/Controller/DbController.php)

[ORM](https://github.com/nirvana72/phpRest-example/blob/main/App/Controller/OrmController.php)

[swagger](https://github.com/nirvana72/phpRest-example/blob/main/App/Controller/SwaggerReturnController.php)

[文件上传](https://github.com/nirvana72/phpRest-example/blob/main/App/Controller/FileUploadController.php)
