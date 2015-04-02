<?php

return [
    'vendorPath' => dirname(dirname(__DIR__)) . '/vendor',
    'components' => [
        'cache' => [
            'class' => 'yii\caching\FileCache',
        ],
//        'mailer' => [
//            'class' => 'yii\swiftmailer\Mailer',
//            'transport' => [
//                'class' => 'Swift_SmtpTransport',
//                'host' => 'gmail.com',
//                'username' => 'developerpages.gr',
//                'password' => '1e2d3p*pla',
//                'port' => '587',
//                'encryption' => 'tls',
//            ],
//        ],
        'urlManager' => [
            'enablePrettyUrl' => true
        ],
    ],
];
