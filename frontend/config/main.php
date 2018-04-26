<?php

$params = array_merge(
        require(__DIR__ . '/../../common/config/params.php'), require(__DIR__ . '/../../common/config/params-local.php'), require(__DIR__ . '/params.php'), require(__DIR__ . '/params-local.php')
);

use \yii\web\Request;

//$baseUrl = str_replace('/frontend/web', '', (new Request)->getBaseUrl());
$FrontEndUrl = ''; // Change if publish site

$modules_var = [
    'frontend_dashboard' => [
        'class' => 'frontend\models\BackendDashBoard',
    ],
    'user' => [
        'class' => 'plathir\user\frontend\Module',
        'ProfileImagePath' => '@media/images/users',
        'ProfileImageTempPath' => '@media/temp/images/users',
        'ProfileImagePathPreview' => $FrontEndUrl . '/media/images/users',
        'ProfileImageTempPathPreview' => $FrontEndUrl . '/media/temp/images/users',
        'Theme' => 'smart',
        'mediaUrl' => '@MediaUrl' . '/images/users',
        'mediaPath' => '@media' . '/images/users',
    ],
    'blog' => [
        'class' => 'plathir\smartblog\frontend\Module',
        'ImagePath' => '@media/images/blog/posts',
        'ImageTempPath' => '@media/temp/images/blog/posts',
        'ImagePathPreview' => '/media/images/blog/posts',
        'ImageTempPathPreview' => '/media/temp/images/blog/posts',
        'mediaUrl' => '@MediaUrl',
        'mediaPath' => '@media',
        'CategoryImagePath' => '@media/images/blog/categories',
        'CategoryImageTempPath' => '@media/temp/images/blog/categories',
        'CategoryImagePathPreview' => '/media/images/blog/categories',
        'CategoryImageTempPathPreview' => '/media/temp/images/blog/categories',
        'KeyFolder' => 'id',
        'userModel' => 'plathir\user\common\models\account\User',
        'userNameField' => 'username',
        //'editor' => 'CKEditor'
        'editor' => 'markdown'
    ],
    'apps' => [
        'class' => 'plathir\apps\Module',
    ],
    'settings' => [
        'class' => 'plathir\settings\Module',
        'modulename' => 'site'
    ],
    'installer' => [
        'class' => 'common\modules\installer\Module',
    ],
    'templates' => [
        'class' => 'plathir\templates\backend\Module',
    ]
];

$components_var = [
    'user' => [
        'identityClass' => 'plathir\user\common\models\account\User',
        'loginUrl' => ['user/security/login'],
        'identityCookie' => [
            'name' => '_frontendUser', // unique for frontend
        ],
    ],
    'blog' => [
        'class' => 'plathir\smartblog\frontend',
    ],
    'authClientCollection' => [
        'class' => 'yii\authclient\Collection',
        'clients' => [
//            'facebook' => [
//                'class' => 'yii\authclient\clients\Facebook',
//                'clientId' => '784640361639775',
//                'clientSecret' => 'e9baa391de0f48838d3137682dd1ae5a',
//            ],
        ],
    ],
    'authManager' => [
        'class' => 'yii\rbac\DbManager', // or use 'yii\rbac\PhpManager'
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
    'settings' => [
        'class' => 'plathir\settings\components\Settings',
        'modulename' => 'site',
    ],
//    'request' => [
//        'baseUrl' => $baseUrl,
//    ],
    'urlManager' => [
        //   'baseUrl' => $baseUrl,
        'enablePrettyUrl' => true,
    ],
    'view' => [
        'theme' => [
//            'basePath' => '@app/themes/smart/views',
//            'baseUrl' => '@web/themes/smart',
            'pathMap' => [
                '@app/views' => '@app/themes/smart/views',
            ],
        ],
    ],
    'assetManager' => [
        'bundles' => [
            'dmstr\web\AdminLteAsset' => [
                'skin' => 'skin-red',
            ],
        ],
    ],
    'searcher' => [
        'class' => \vintage\search\SearchComponent::class,
        'models' => [
            'Posts' => [
                'class' => \plathir\smartblog\frontend\models\PostsGlobalSearch::class,
                'label' => 'Posts',
            ],
            'Recipes' => [
                'class' => apps\recipes\frontend\models\RecipesGlobalSearch::class,
                'label' => 'Recipes',
            ],
        ]
    ],
    'templates' => [
        'class' => 'plathir\templates\components\Templates',
    ]
];

// load apps
$modules_dir = Yii::getAlias('@apps');
$handle = opendir($modules_dir);

while (false !== ($file = readdir($handle))) {
    if ($file != '.' && $file != '..' && $file != 'uploads') {
        $modules_var["$file"] = [
            'class' => 'apps' . '\\' . $file . '\\' . 'frontend\Module',
        ];

        $components_var["$file"] = [
            'class' => 'apps' . '\\' . $file . '\\' . 'frontend',
        ];
    }
}

closedir($handle);

return [
    'id' => 'app-frontend',
    'basePath' => dirname(__DIR__),
    'bootstrap' => ['log',
        //'app\components\Bootstrap',
    ],
    'controllerNamespace' => 'frontend\controllers',
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
//            'installer/*',
            'site/*',
//            'user/auth/*',
            'user/security/logout',
            'user/security/login',
            'user/registration/*',
            'user/security/auth', // for Oauth ( Login from facebook etc. )
            'blog/*',
            //    'blog/posts/view',
            'apps/*',
//            'apptest1/*',
            'debug/*',
            'recipes/*',
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
