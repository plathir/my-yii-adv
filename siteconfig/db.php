<?php

$db['db'] = [
    'class' => 'yii\db\Connection',
    'dsn' => 'mysql:host=__DB_HOST__;dbname=__DATABASE__',
    'username' => '__DB_USER__',
    'password' => '__DB_USER_PASS__',
    'charset' => 'utf8',
    'tablePrefix' => '__TB_PREFIX__',
];

$filename = __DIR__ . '/db-local.php';

if (file_exists($filename)) {
    require $filename;
}