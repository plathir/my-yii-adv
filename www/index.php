<?php

require(__DIR__ . '/../siteconfig/env.php');
require(__DIR__ . '/../siteconfig/frontend.php');

require($vendor_path . '/autoload.php');
require($vendor_path . '/yiisoft/yii2/Yii.php');

require(__DIR__ . '/../common/config/bootstrap.php');
require(__DIR__ . '/../frontend/config/bootstrap.php');
require(__DIR__ . '/../common/config/aliases.php');

$config = yii\helpers\ArrayHelper::merge(
                require(__DIR__ . '/../common/config/main.php'), 
                require(__DIR__ . '/../frontend/config/main.php'), 
                require(__DIR__ . '/../frontend/config/main-testing.php'), 
                require(__DIR__ . '/../siteconfig/common-config.php')
);

$application = new yii\web\Application($config);
$application->run();
