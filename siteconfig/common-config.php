<?php

require(__DIR__ . '/vendorpath.php');

return [
    'vendorPath' => $vendor_path,
    'components' => [
        'db' => [
            'class' => 'yii\db\Connection',
            'dsn' => 'mysql:host=localhost;dbname=my_yii2_adv',
           // 'dsn' => 'mysql:host=localhost;dbname=developerpages',
            'username' => 'root',
            'password' => 'root',
            'charset' => 'utf8',
        ]
    ]
];
