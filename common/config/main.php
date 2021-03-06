<?php

use \kartik\datecontrol\Module;

//require(__DIR__ . '/../../siteconfig/frontend.php');

return [
    //'vendorPath' => $vendor_path,
    // 'vendorPath' => dirname(dirname(__DIR__)) . '/vendor',
    // uncomment line for move vendors folder to share with another apps
    // 'vendorPath' => dirname(dirname(dirname(__DIR__))) . '/frameworks/yii2',
    // uncomment lines for move vendors folder to share with another apps

    'aliases' => [
        '@bower' => '@vendor/bower-asset',
        '@npm' => '@vendor/npm-asset',
    ],
    'components' => [
        'cache' => [
            'class' => 'yii\caching\FileCache',
        ],
        'mailer' => [
            'class' => 'yii\swiftmailer\Mailer',
        ],
        'log' => [
            'targets' => [
                'file' => [
                    'class' => 'yii\log\FileTarget',
                    'levels' => ['error', 'warning'],
                    'logFile' => '@runtime/logs/error.log',
                ],
//                [
//                    'class' => 'yii\log\FileTarget',
//                    'categories' => ['blog'],
//                    'logFile' => '@app/runtime/logs/blog.log',
//                ],
                [
                    'class' => 'yii\log\DbTarget',
                    'categories' => ['blog'],
                //'levels' => ['error', 'warning'],
                ],
            ],
        ],
//        'session' => [
//            'class' => 'yii\web\DbSession',
//            'writeCallback' => function ($session) {
//                return [
//                    'user_id' => Yii::$app->user->id,
//                    'last_write' => date("Y-m-d H:i:s"),
//                ];
//            },
//        ],
    ],
    'modules' => [
        'datecontrol' => [
            'class' => 'kartik\datecontrol\Module'
        ],
//            // format settings for displaying each date attribute (ICU format example)
//            'displaySettings' => [
//                Module::FORMAT_DATE => 'php:d-m-Y',
//                Module::FORMAT_TIME => 'hh:mm:ss a',
//                Module::FORMAT_DATETIME => 'dd-MM-yyyy hh:mm:ss a',
//            ],
//            // format settings for saving each date attribute (PHP format example)
//            'saveSettings' => [
//                Module::FORMAT_DATE => 'php:Y-m-d', // saves as unix timestamp
//                Module::FORMAT_TIME => 'php:H:i:s',
//                Module::FORMAT_DATETIME => 'php:Y-m-d H:i:s',
//            ],
//            // set your display timezone
//            'displayTimezone' => 'Europe/Athens',
//            // set your timezone for date saved to db
//            'saveTimezone' => 'UTC',           
//            // automatically use kartik\widgets for each of the above formats
//            'autoWidget' => true,
//            // default settings for each widget from kartik\widgets used when autoWidget is true
//            'autoWidgetSettings' => [
//                Module::FORMAT_DATE => ['type' => 2, 'pluginOptions' => ['autoclose' => true]], // example
//                Module::FORMAT_DATETIME => ['type' => 1, 'pluginOptions' => ['autoclose' => true]], // setup if needed
//                Module::FORMAT_TIME => [], // setup if needed
//            ],
//            
//            // custom widget settings that will be used to render the date input instead of kartik\widgets,
//            // this will be used when autoWidget is set to false at module or widget level.
//            'widgetSettings' => [
//                Module::FORMAT_DATE => [
//                    'class' => 'yii\jui\DatePicker', // example
//                    'options' => [
//                        'dateFormat' => 'php:Y-m-d',
//                        'options' => ['class' => 'form-control'],
//                    ]
//                ]
//            ]
//        // other settings
//        ]
    ]
];
