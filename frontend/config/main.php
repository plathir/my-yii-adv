<?php

$params = array_merge(
        require(__DIR__ . '/../../common/config/params.php'), require(__DIR__ . '/../../common/config/params-local.php'), require(__DIR__ . '/params.php'), require(__DIR__ . '/params-local.php')
);

return [
    'id' => 'app-frontend',
    'basePath' => dirname(__DIR__),
    'bootstrap' => ['log'],
    'controllerNamespace' => 'frontend\controllers',
    'modules' => [
        'user' => [
            'class' => 'plathir\user\Module',
//            'admins' => ['admin'],
//            'enableUnconfirmedLogin' => true,
        ],
        'smartblog' => [
            'class' => 'plathir\smartblog\Module',
        ]
    ],
    'components' => [
        'user' => [
            'identityClass' => 'plathir\user\models\User',
        ],
//        'user' => [
//            'identityClass' => 'dektrium\user\models\User',
//            'enableAutoLogin' => true,
//        ],
//        'authClientCollection' => [
//            'class' => 'yii\authclient\Collection',
//            'clients' => [
//                'google' => [
//                    'class' => 'yii\authclient\clients\GoogleOpenId'
//                ],
//                'facebook' => [
//                    'class' => 'yii\authclient\clients\Facebook',
//                    'clientId' => 'facebook_client_id',
//                    'clientSecret' => 'facebook_client_secret',
//                ],
//            ],
//        ],
        'log' => [
            'traceLevel' => YII_DEBUG ? 3 : 0,
            'targets' => [
                [
                    'class' => 'yii\log\FileTarget',
                    'levels' => ['error', 'warning'],
                ],
            ],
        ],
        'errorHandler' => [
            'errorAction' => 'site/error',
        ],
    ],
    'params' => $params,
];
