<?php
ob_start();
session_start();
echo 'This is config.php!';
return [
    'db' => [
        'host' => 'mysql:host=localhost;',
        'dbName' => 'dbname=myPHP',
        'name' => 'rd',
        'password' => '123',
        'options' => [
            PDO::ATTR_ERRMODE=>PDO::ERRMODE_EXCEPTION
        ]
    ]
];
