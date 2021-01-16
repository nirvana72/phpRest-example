Example 目录下的php不会被框架加载， 默认只为示例, 当然也可以直接删除

如果要使 Example 下的内容生效
需要
  1. composer.json
      // 修改
      "autoload": {
          "psr-4": {
              ...
              "Example\\": "Example/"
          }
      }
    
      // 执行
      composer update

  2. public\index.php
      // 修改
      ...
      $app->loadRoutesFromPath( __DIR__.'/../Example/Controller', 'Example\\Controller');
