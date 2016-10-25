<?php
return [
    'components' => [
        'db' => [
            'class' => 'yii\db\Connection',
            'dsn' => 'mysql:host=localhost;dbname=indeego-test',
            'username' => 'root',
            'password' => 'test',
            'charset' => 'utf8',
        ],
    ],
];
