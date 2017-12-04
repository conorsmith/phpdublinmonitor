<?php

require_once __DIR__ . "/vendor/autoload.php";

(new \Dotenv\Dotenv(__DIR__))->load();

return [

    'paths' => [
        'migrations' => __DIR__ . "/database/migrations",
    ],

    'environments' => [
        'default_database' => "env_vars",
        'env_vars'         => [
            'adapter' => "mysql",
            'host'    => getenv('DB_HOST'),
            'name'    => getenv('DB_NAME'),
            'user'    => getenv('DB_USER'),
            'pass'    => getenv('DB_PASS'),
        ],
    ],

];
