<?php

$params = array_merge(
        require(__DIR__ . '/../../common/config/params.php'), require(__DIR__ . '/../../common/config/params-local.php'), require(__DIR__ . '/params.php'), require(__DIR__ . '/params-local.php')
);

return [
    'id' => 'app-backend',
    'basePath' => dirname(__DIR__),
    'controllerNamespace' => 'backend\controllers',
    'bootstrap' => ['log'],
    'modules' => [
        'user' => [
            'class' => 'plathir\user\Module',
            'ProfileImagePath' => '@media/images/users',
            'ProfileImageTempPath' => '@media/temp/images/users',
            'ProfileImagePathPreview' => '/my-yii-adv/media/images/users'
        ],
        'admin' => [
            'class' => 'mdm\admin\Module',
        ],
        'smartblog' => [
            'class' => 'plathir\smartblog\Module',
        ],
        'blog' => [
            'class' => 'plathir\smartblog\Module',
        ],
        'apps' => [
            'class' => 'plathir\apps\Module',
        ]        
    ],
    'components' => [
        'user' => [
            'identityClass' => 'plathir\user\models\account\User',
            'loginUrl' => ['user/security/login'],
            'identityCookie' => [
                'name' => '_backendUser', // unique for frontend
            ]
        ],
        'blog' => [
            'class' => 'plathir\smartblog',
         ],
        'apps' => [
            'class' => 'plathir\apps',
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
        'authManager' => [
            'class' => 'yii\rbac\DbManager', // or use 'yii\rbac\PhpManager'
        ],        
        'session' => [
            'name' => 'PHPBACKSESSID',
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
        'as access' => [
        'class' => 'mdm\admin\components\AccessControl',
        'allowActions' => [
//            'site/*',
//            'user/registration/*',
//            'user/security/auth', // for Oauth ( Login from facebook etc. )
//            'blog/posts/list',
//            'blog/posts/view',
//            'apps/*',
//            '*'
        // The actions listed here will be allowed to everyone including guests.
        // So, 'admin/*' should not appear here in the production, of course.
        // But in the earlier stages of your development, you may probably want to
        // add a lot of actions here until you finally completed setting up rbac,
        // otherwise you may not even take a first step.
        ]
    ],
    'params' => $params,
];
