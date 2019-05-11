<?php
////
////defined('YII_DEBUG') or define('YII_DEBUG', true);
////defined('YII_ENV') or define('YII_ENV', 'dev');
//
//require(__DIR__ . '/../../siteconfig/vendorpath.php');
//
//require($vendor_path . '/autoload.php');
//require($vendor_path . '/yiisoft/yii2/Yii.php');
//
//require(__DIR__ . '/../../common/config/bootstrap.php');
////require(__DIR__ . '/../../common/config/aliases.php');
//
//$config =  require(__DIR__ . '/../../installation/config/main.php');
//
//$application = new yii\web\Application($config);
//$application->run();


require(__DIR__ . '/../../siteconfig/env.php');
require(__DIR__ . '/../../siteconfig/vendorpath.php');

require($vendor_path . '/autoload.php');
require($vendor_path . '/yiisoft/yii2/Yii.php');

require(__DIR__ . '/../../common/config/bootstrap.php');
require(__DIR__ . '/../../common/config/aliases.php');

$config =  require(__DIR__ . '/../../installation/config/main.php');

$application = new yii\web\Application($config);
$application->run();
