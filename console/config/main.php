<?php

$params = array_merge(
        require(__DIR__ . '/../../common/config/params.php'), require(__DIR__ . '/params.php')
);
require(__DIR__ . '/../../siteconfig/db.php');
require(__DIR__ . '/../../siteconfig/vendorpath.php');



return [
    'id' => 'app-console',
    'basePath' => dirname(__DIR__),
    'bootstrap' => ['log'],
    'vendorPath' => $vendor_path,
    'controllerNamespace' => 'console\controllers',
    'components' => array_merge($db, [
        'log' => [
            'targets' => [
                [
                    'class' => 'yii\log\FileTarget',
                    'levels' => ['error', 'warning'],
                ],
            ],
        ],
    ]),
    'params' => $params,
    'aliases' => [
        '@bower' => '@vendor/bower-asset',
        '@npm' => '@vendor/npm-asset',
        '@migration' => dirname(dirname(__DIR__)) . '/migrations/',
    ],
];
