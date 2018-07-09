<?php
$C=[
    'default_route'=>[
        'group'=>"home",
         'controller'=>"index",
        'action'=>"index"
    ],
    'db' => [
        'dsn'=>"mysql:dbname=KP;host=localhost",
        'user'=>'root',
        'password'=>'666',
        'option'=>array (
            \PDO::ATTR_PERSISTENT => TRUE,
        \PDO::ATTR_ERRMODE => \PDO::ERRMODE_EXCEPTION,
        \PDO::ATTR_ORACLE_NULLS=>true)
    ]
];


