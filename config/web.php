<?php

use yii\helpers\ArrayHelper;

Yii::setAlias('app', dirname(__DIR__));

$params = call_user_func_array('array_merge', [
    require(__DIR__ . '/params.php'),
    require(__DIR__ . '/params-local.php'),
]);

$config = [
    'id' => 'basic',
    'name' => 'indeego-test',
    'basePath' => dirname(__DIR__),
    'bootstrap' => ['log'],
    'defaultRoute' => 'site',
    'sourceLanguage' => 'en-US',
    'language' => 'ru-RU',
    'components' => [
        'request' => [
            // !!! insert a secret key in the following (if it is empty) - this is required by cookie validation
            'cookieValidationKey' => 'MncC6buSeJicKfZK9nN9MIsK3If6K1sZ',
        ],
        'urlManager' => [
            'enablePrettyUrl' => true,
            'showScriptName' => false,
        ],
        'cache' => [
            'class' => 'yii\caching\FileCache',
        ],
        'errorHandler' => [
            'errorAction' => 'site/error',
        ],
        'log' => [
            'traceLevel' => YII_DEBUG ? 3 : 0,
            'targets' => [
                [
                    'class' => 'yii\log\FileTarget',
                    'levels' => ['error', 'warning'],
                ],
            ],
        ],
        'i18n' => [
            'translations' => [
                'app*' => [
                    'class' => 'yii\i18n\PhpMessageSource',
                    'sourceLanguage' => 'en-US',
                    'basePath' => '@app/messages',
                    'forceTranslation' => true,
                ],
            ],
        ],
        'session' => [
            'name' => 'indeego_test_' . YII_ENV,
        ],
    ],
    'params' => $params,
];

$config = ArrayHelper::merge($config, require(__DIR__ . '/web-local.php'));

return $config;
