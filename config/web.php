<?php

$params = require(__DIR__ . '/params.php');

$config = [
    'id' => 'Webmanager',
    'basePath' => dirname(__DIR__),
    'bootstrap' => ['log'],
    'language' => 'uk',
    'components' => [
        'urlManager' => [
            'enablePrettyUrl' => true,
            'enableStrictParsing' => true,
            'showScriptName' => false,
            'rules'=>[
                '' => 'site/index',
                'logout' => 'site/logout',
                'login' => 'site/login',


                'POST <controller:\w+>s' => '<controller>/create', // 'mode' => UrlRule::PARSING_ONLY will be implicit here
                '<controller:\w+>'      => '<controller>/index',

                'PUT <controller:\w+>/<id:\d+>'    => '<controller>/update', // 'mode' => UrlRule::PARSING_ONLY will be implicit here
                'DELETE <controller:\w+>/<id:\d+>' => '<controller>/delete', // 'mode' => UrlRule::PARSING_ONLY will be implicit here
                '<controller:\w+>/<id:\d+>'        => '<controller>/view',

                // normal routes for CRUD operations
                '<controller:\w+>/create' => '<controller>/create',
                '<controller:\w+>/<id:\d+>/<action:update|delete|start|stop>' => '<controller>/<action>',
                '<controller:\w+>/<action>'        => '<controller>/<action>',
            ],
        ],
        'i18n' => [
            'translations' => [
                '*' => [
                    'class' => 'yii\i18n\PhpMessageSource'
                ],
            ],
        ],
        'assetManager' => [
            'bundles' => [
                'yii\bootstrap\BootstrapAsset' => [
                    'sourcePath' => '@app/web/css',
                    'css' => [
                        'css/bootstrap.css' => "global/plugins/bootstrap/css/bootstrap.min.css",
                    ]
                ],
                'yii\bootstrap\AppAsset' => [
                    'sourcePath' => '@app/web/css',
                ],
            ],
        ],
        'request' => [
            // !!! insert a secret key in the following (if it is empty) - this is required by cookie validation
            'cookieValidationKey' => 'u1Wub6ERl8JBPzUjOmvmMqgiacrUGeihB70',
        ],
        'cache' => [
            'class' => 'yii\caching\FileCache',
        ],
        'user' => [
            'identityClass' => 'app\models\User',
            'enableAutoLogin' => true,
        ],
        'errorHandler' => [
            'errorAction' => 'site/error',
        ],
        'mailer' => [
            'class' => 'yii\swiftmailer\Mailer',
            // send all mails to a file by default. You have to set
            // 'useFileTransport' to false and configure a transport
            // for the mailer to send real emails.
            'useFileTransport' => true,
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
        'db' => require(__DIR__ . '/db.php'),
        'ss' => [
            'class' => 'app\components\Ss',
        ],

    ],
    'params' => $params,
];

if (YII_ENV_DEV) {
    // configuration adjustments for 'dev' environment
    $config['bootstrap'][] = 'debug';
    $config['modules']['debug'] = 'yii\debug\Module';

    $config['bootstrap'][] = 'gii';
    $config['modules']['gii'] = 'yii\gii\Module';
}

return $config;
