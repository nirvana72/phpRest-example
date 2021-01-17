<?php

return [
    'env' => 'develop',
    
    'database' => [ // see https://medoo.in/api/new
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
];