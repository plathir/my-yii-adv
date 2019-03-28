<?php
$db['db'] = [
    'class' => 'yii\db\Connection',
    'dsn' => 'mysql:host=localhost;dbname=__DATABASE__',
    // 'dsn' => 'mysql:host=localhost;dbname=developerpages',
    'username' => '__DB_USER__',
    'password' => '__DB_USER_PASS__',
    'charset' => 'utf8',
    'tablePrefix' => '__TB_PREFIX__',
];

$filename = __DIR__ . '/db-local.php';

if (file_exists($filename)) {
    require $filename;
}