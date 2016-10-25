<?php

use yii\helpers\ArrayHelper;

Yii::setAlias('@tests', dirname(__DIR__) . '/tests');

$params = call_user_func_array('array_merge', [
    require(__DIR__ . '/params.php'),
    require(__DIR__ . '/params-local.php'),
]);

$config = [
    'id' => 'basic-console',
    'basePath' => dirname(__DIR__),
    'bootstrap' => ['log', 'gii'],
    'controllerNamespace' => 'app\commands',
    'sourceLanguage' => 'en-US',
    'language' => 'ru-RU',
    'modules' => [
        'gii' => 'yii\gii\Module',
    ],
    'components' => [
        'authManager' => [
            'class' => 'app\components\RbacManager',
            'defaultRoles' => ['guest'],
        ],
        'cache' => [
            'class' => 'yii\caching\FileCache',
        ],
        'log' => [
            'targets' => [
                [
                    'class' => 'yii\log\FileTarget',
                    'levels' => ['error', 'warning'],
                ],
            ],
        ],
    ],
    'params' => $params,
];

$config = ArrayHelper::merge($config, require(__DIR__ . '/console-local.php'));

return $config;
