<?php

$params = array_merge(
        require(__DIR__ . '/../../common/config/params.php'), require(__DIR__ . '/../../common/config/params-local.php'), require(__DIR__ . '/params.php'), require(__DIR__ . '/params-local.php')
);

//$FrontEndUrl = '/my-yii-adv/frontend/web'; // Change if publish site
$FrontEndUrl = ''; // Change if publish site

$modules_var = [
    'frontendconfig' => require(__DIR__ . '/../../frontend/config/main.php'),
    'backend_dashboard' => [
      'class' => 'backend\models\BackendDashBoard',  
    ],
    'user' => [
        'class' => 'plathir\user\backend\Module',
        'ProfileImagePath' => '@media/images/users',
        'ProfileImageTempPath' => '@media/temp/images/users',
        'ProfileImagePathPreview' => $FrontEndUrl . '/media/images/users',
        'ProfileImageTempPathPreview' => $FrontEndUrl . '/media/temp/images/users',
        'Theme' => 'smart',
    ],
    'admin' => [
        'class' => 'mdm\admin\Module',
    ],
    'smartblog' => [
        'class' => 'plathir\smartblog\Module',
    ],
    'blog' => [
        'class' => 'plathir\smartblog\backend\Module',
        'ImagePath' => '@media/images/blog/posts',
        'ImageTempPath' => '@media/temp/images/blog/posts',
        'ImagePathPreview' => $FrontEndUrl . '/media/images/blog/posts',
        'ImageTempPathPreview' => $FrontEndUrl . '/media/temp/images/blog/posts',
        'mediaUrl' => '@MediaUrl',
        'mediaPath' => '@media',
        'CategoryImagePath' => '@media/images/blog/categories',
        'CategoryImageTempPath' => '@media/temp/images/blog/categories',
        'CategoryImagePathPreview' => $FrontEndUrl . '/media/images/blog/categories',
        'CategoryImageTempPathPreview' => $FrontEndUrl . '/media/temp/images/blog/categories',
        'KeyFolder' => 'id',
        'userModel' => 'plathir\user\common\models\account\User',
        'userNameField' => 'username',
        'Theme' => 'smart',
    ],
    'apps' => [
        'class' => 'plathir\apps\Module',
    ],
    'settings' => [
        'class' => 'plathir\settings\Module',
        'modulename' => 'site'
    ],
    'widgets' => [
        'class' => 'plathir\widgets\backend\Module',
        'Theme' => 'smart',
    ]
];

$components_var = [
    'user' => [
        'identityClass' => 'plathir\user\common\models\account\User',
        'loginUrl' => ['user/security/backend-login'],
        'identityCookie' => [
            'name' => '_backendUser', // unique for frontend
        ]
    ],
    'blog' => [
        'class' => 'plathir\smartblog\backend',
    ],
    'apps' => [
        'class' => 'plathir\apps',
    ],
//    'view' => [
//        'theme' => [
//            'pathMap' => [
//                '@vendor/plathir/yii2-smart-user/views' => '@app/views/user'
//            ],
//        ]
//    ],
//    'authClientCollection' => [
//        'class' => 'yii\authclient\Collection',
//        'clients' => [
//            'facebook' => [
//                'class' => 'yii\authclient\clients\Facebook',
//                'clientId' => '1705693669662485',
//                'clientSecret' => 'a20b265600a4a65506e13f4494ebe4b4',
//            ],
//        ],
//    ],
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
    'settings' => [
        'class' => 'plathir\settings\components\Settings',
        'modulename' => 'site',
    ],
    'urlManager' => [
        'class' => 'yii\web\urlManager',
        'enablePrettyUrl' => true,
        'rules' => [
            'admin' => 'www/admin',
        ]
    ],
    'urlManagerFrontEnd' => [
        'enablePrettyUrl' => true,
        'class' => 'yii\web\urlManager',
        'baseUrl' => $FrontEndUrl,
        'scriptUrl' => 'index.php',
    ],
    'widgets' => [
        'class' => 'plathir\widgets\backend\Module',
    ],
    
//    'assetManager' => [
//        'bundles' => [
//            'dmstr\web\AdminLteAsset' => [
//                'sourcePath' => '@vendor/almasaeed2010/adminlte/',
//                'js' => [
//                    'dist/js/app.min.js',
//                    'plugins/slimScroll/jquery.slimscroll.min.js',
//                ],
//                'css' => [
//                  'dist/css/AdminLTE.min.css',  
//                ],
//                'depends' => [
//                    'rmrevin\yii\fontawesome\AssetBundle',
//                    'yii\web\YiiAsset',
//                    'yii\bootstrap\BootstrapAsset',
//                    'yii\bootstrap\BootstrapPluginAsset',
//                ],
//            ],
//           'skin' => 'skin-red',
//		   ],
//    ],
//	],
];

// load apps
$modules_dir = Yii::getAlias('@apps');
$handle = opendir($modules_dir);

while (false !== ($file = readdir($handle))) {
    if ($file != '.' && $file != '..' && $file != 'uploads') {
        $modules_var["$file"] = [
            'class' => 'apps' . DIRECTORY_SEPARATOR . $file . DIRECTORY_SEPARATOR . 'backend\Module',
        ];

        $components_var["$file"] = [
            'class' => 'apps' . DIRECTORY_SEPARATOR . $file . DIRECTORY_SEPARATOR . 'backend',
        ];
    }
}
closedir($handle);

return [
    'id' => 'app-backend',
    'name' => 'test Name',
    'timezone' => 'Europe/Athens',
    'basePath' => dirname(__DIR__),
    'controllerNamespace' => 'backend\controllers',
    'bootstrap' => [
        'log',
    //      'app\components\Bootstrap'
    ],
    'modules' => $modules_var,
    'components' => $components_var,
    'on beforeRequest' => function () {
$user = Yii::$app->user->identity;
if ($user && $user->timezone) {
    Yii::$app->setTimeZone($user->timezone);
}
},
    'as access' => [
        'class' => 'mdm\admin\components\AccessControl',
        'allowActions' => [
//            'settings/*'
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
