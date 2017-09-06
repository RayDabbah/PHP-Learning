<?php

// echo 'This is config
return [
    'db' => [
        'host' => 'mysql:host=localhost;',
        'dbName' => 'dbname=myPHP',
        'name' => '/* place name here */',
        'password' => 'place password here',
        'options' => [
            PDO::ATTR_ERRMODE => PDO::ERRMODE_SILENT
        ]
    ]
];
        