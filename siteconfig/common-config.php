<?php
require(__DIR__ . '/vendorpath.php');
require(__DIR__ . '/db.php');

return [
    'name' => '__APP_NAME__',
    'vendorPath' => $vendor_path,
    'components' => array_merge(
            $db, [
        'mailer' => [
            'class' => 'yii\swiftmailer\Mailer',
//            'viewPath' => '@backend/mail',
//            'useFileTransport' => false, //set this property to false to send mails to real email addresses
            //comment the following array to send mail using php's mail function
            'transport' => [
                'class' => 'Swift_SmtpTransport',
                'host' => 'smtp.gmail.com',
                'username' => 'plathir.localhost@gmail.com',
                'password' => 'george1234',
                'port' => '587',
                'encryption' => 'tls',
            ],
        ],
    ])
];
