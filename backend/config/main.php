<?php

use yii\helpers\Url;

$params = array_merge(
        require(__DIR__ . '/../../common/config/params.php'), require(__DIR__ . '/params.php')
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
        'mediaUrl' => '@MediaUrl' . '/images/users',
        'mediaPath' => '@media' . '/images/users',
    ],
    'admin' => [
        'class' => 'mdm\admin\Module',
        'viewPath' => '@realAppPath/themes/admin/smart/module/admin/views'
    ],
//    'smartblog' => [
//        'class' => 'plathir\smartblog\Module',
//    ],
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
        //'editor' => 'markdown',
        'editor' => 'CKEditor',
//        'i18n' => [
//            'class' => 'yii\i18n\PhpMessageSource',
//            'basePath' => '@vendor/kartik-v/yii2-tree-manager/messages',
//            'forceTranslation' => true
//        ],
    ],
    'apps' => [
        'class' => 'plathir\apps\backend\Module',
    ],
    'settings' => [
        'class' => 'plathir\settings\backend\Module',
        'modulename' => 'site'
    ],
    'widgets' => [
        'class' => 'plathir\widgets\backend\Module',
        'Theme' => 'smart',
    ],
    'doc' => [
        'class' => 'common\modules\doc\Module',
    ],
    'snippets' => [
        'class' => 'common\modules\snippets\Module',
    ],
    'log' => [
        'class' => 'plathir\log\backend\Module',
    ],
    'templates' => [
        'class' => 'plathir\templates\backend\Module',
    ],
    'logreader' => [
        'class' => 'zhuravljov\yii\logreader\Module',
        'aliases' => [
            'Frontend Errors' => '@RootPath/runtime/logs/app.log',
            'Frontend Blog Errors' => '@RootPath/runtime/logs/blog.log',
            'Backend Errors' => '@adminRootPath/runtime/logs/app.log',
            'Backend Errors1' => '@adminRootPath/runtime/logs/errors.log',
            'Console Errors' => '@console/runtime/logs/app.log',
        ],
        'viewPath' => '@vendor/plathir/yii2-smart-log/backend/themes/smart/views/logreader',
        'layout' => 'main',
    ],
    'treemanager' => [
        'class' => '\kartik\tree\Module',
    // other module settings, refer detailed documentation
    ],
//    'treemanager' => [
//        'class' => '\kartik\tree\Module',
//    // enter other module properties if needed
//    // for advanced/personalized configuration
//    // (refer module properties available below)
//    ]
    'treemanager' => [
        'class' => '\kartik\tree\Module',
    // enter other module properties if needed
    // for advanced/personalized configuration
    // (refer module properties available below)
    ]
];

$components_var = [
    'request' => [
        // !!! insert a secret key in the following (if it is empty) - this is required by cookie validation
        'cookieValidationKey' => $cookieValidationKey, //   
        'csrfParam' => '_backendCSRF',
    ],
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
    'view' => [
        'theme' => [
//            'basePath' => '@app/themes/smart/views',
//            'baseUrl' => '@web/themes/smart',
            'pathMap' => [
                '@app/views' => '@app/themes/smart/views'
//                '@app/views' => '@realAppPath/themes/smart/admin/module/base/views', // path for new views Path
            ],
        ],
    ],
//    'view' => [
//        'theme' => [
//            'pathMap' => [
//                '@vendor/plathir/yii2-smart-user/views' => '@app/views/user'
//            ],
//        ]
//    ],
    'authClientCollection' => [
        'class' => 'yii\authclient\Collection',
        'clients' => [
//            'facebook' => [
//                'class' => 'yii\authclient\clients\Facebook',
//                'clientId' => '1705693669662485',
//                'clientSecret' => 'a20b265600a4a65506e13f4494ebe4b4',
//            ],
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
    'settings' => [
        'class' => 'plathir\settings\components\Settings',
        'modulename' => 'site',
    ],
    'templates' => [
        'class' => 'plathir\templates\components\Templates',
    ],
    'urlManager' => [
        'class' => 'codemix\localeurls\UrlManager',
//        // List all supported languages here
//        // Make sure, you include your app's default language.
        'languages' => ['en', 'el', 'ru'],
        //'showScriptName' => false,
        'enablePrettyUrl' => true,
        'rules' => [
        // 'encodeParams' => false,
        //'admin' => 'www/admin',
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
    'assetManager' => [
        'bundles' => [
            'dmstr\web\AdminLteAsset' => [
                'skin' => 'skin-blue',
            ],
        ],
    ],
    'searcher' => [
        'class' => \vintage\search\SearchComponent::class,
        'models' => [
            'Posts' => [
                'class' => \plathir\smartblog\backend\models\PostsGlobalSearch::class,
                'label' => 'Posts',
            ],
        ]
    ],
    'i18n' => [
        'translations' => [
            'app*' => [
                'class' => 'yii\i18n\PhpMessageSource',
                //'basePath' => '@app/messages',
                //'sourceLanguage' => 'en-US',
                'basePath' => Yii::getAlias('@backend/messages'),
            ],
        ],
    ],
    'translate' => [
        'class' => 'common\components\Translation',
        'key' => 'trnsl.1.1.20190128T142141Z.a0f73543958da192.e862f6a79a4692fb56e11fef1b8137357f839768',
    ],
    'frontendCache' => [
        'class' => 'yii\caching\FileCache',
        'cachePath' => Yii::getAlias('@RootPath') . '/runtime/cache'
    ],
    'session' => [
        'class' => 'yii\web\DbSession',
        'name' => 'SMARTSESSIONBACKEND',
        'writeCallback' => function ($session) {
            return [
                'user_id' => Yii::$app->user->id,
                'environment' => 'backend',
                'last_write' => date("Y-m-d H:i:s"),
            ];
        },
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

//echo Yii::getAlias('@adminRootPath') . '/runtime' . '<br>';
//echo Yii::getAlias('@RootPath') . '/runtime' . '<br>';
//die();

while (false !== ($file = readdir($handle))) {
    if ($file != '.' && $file != '..' && $file != 'uploads') {
        $modules_var["$file"] = [
            'class' => 'apps' . '\\' . $file . '\\' . 'backend\Module',
        ];

        $components_var["$file"] = [
            'class' => 'apps' . '\\' . $file . '\\' . 'backend',
        ];
    }
}
closedir($handle);

return [
    'id' => 'app-backend',
 //   'name' => 'test Name',
    'timezone' => 'Europe/Athens',
    'basePath' => dirname(__DIR__),
    'runtimePath' => Yii::getAlias('@adminRootPath') . '/runtime',
    'controllerNamespace' => 'backend\controllers',
    'bootstrap' => [
        'log',
        'logreader',
        'backend\components\ModuleBootstrap'
    ],
    'modules' => $modules_var,
    'components' => $components_var,
    'on beforeRequest' => function () {
        $user = Yii::$app->user->identity;
        if ($user && $user->timezone) {
            Yii::$app->setTimeZone($user->timezone);
        }
        if (Yii::$app->session->get('lang')) {
            Yii::$app->language = Yii::$app->session->get('lang');
        } else {
            Yii::$app->language = 'en';
        }
    },
    'as access' => [
        'class' => 'mdm\admin\components\AccessControl',
        'allowActions' => [
            'debug/*',
            'datecontrol/*',
//              'log/*',
//      'admin/*'
//            'settings/*'
//              'site/*',
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
