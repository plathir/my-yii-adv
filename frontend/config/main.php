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
            'ProfileImagePath' => '@media/images/users',
            'ProfileImageTempPath' => '@media/temp/images/users',
            'ProfileImagePathPreview' => '/my-yii-adv/media/images/users',
        ],
        'smartblog' => [
            'class' => 'plathir\smartblog\Module',
        ]
    ],
    'components' => [
        'user' => [
            'identityClass' => 'plathir\user\models\account\User',
            'loginUrl' => ['user/security/login'],
            'identityCookie' => [
                'name' => '_frontendUser', // unique for frontend
            ],
//            'components' => [
//                'authClientCollection' => [
//                    'class' => 'yii\authclient\Collection',
//                    'clients' => [
//                        'facebook' => [
//                            'class' => 'yii\authclient\clients\Facebook',
//                            'clientId' => '1705693669662485',
//                            'clientSecret' => 'a20b265600a4a65506e13f4494ebe4b4',
//                        ],
//                    ],
//                ],
//            ]
        ],
        'authClientCollection' => [
            'class' => 'yii\authclient\Collection',
            'clients' => [
                'facebook' => [
                    'class' => 'yii\authclient\clients\Facebook',
                    'clientId' => '1705693669662485',
                    'clientSecret' => 'a20b265600a4a65506e13f4494ebe4b4',
                ],
            ],
        ],
        'session' => [
            'name' => 'PHPFRONTSESSID',
            'savePath' => sys_get_temp_dir(),
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
        'errorHandler' => [
            'errorAction' => 'site/error',
        ],
    ],
    'params' => $params,
];
