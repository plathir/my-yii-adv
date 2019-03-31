<?php

require(__DIR__ . '/../../siteconfig/db.php');

return [
    'id' => 'install',
    'basePath' => dirname(__DIR__),
    //'controllerNamespace' => 'installation\controllers',
    'controllerNamespace' => 'installation\controllers',
//    'defaultRoute' => 'site',
    'vendorPath' => $vendor_path,
    'components' => array_merge($db, [
        'request' => [
            // !!! insert a secret key in the following (if it is empty) - this is required by cookie validation
            'cookieValidationKey' => 'installcookieValidationKey', //   
            'csrfParam' => '_installationCSRF',
        ],
    ]),
    'aliases' => [
        '@bower' => '@vendor/bower-asset',
        '@npm' => '@vendor/npm-asset',     
        '@migration' => dirname(dirname(__DIR__)) . '/migrations/',
    
    ],
];
