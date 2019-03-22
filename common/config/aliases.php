<?php
/**
 * Set all application aliases.
 */
//Yii::setAlias('@media', dirname(dirname(__DIR__)) . '/frontend/web/media');
//Yii::setAlias('@media', '@frontend'. '/web/media');
Yii::setAlias('@adminRootPath', dirname(dirname(__DIR__)) . '/www/admin');
Yii::setAlias('@RootPath', dirname(dirname(__DIR__)) . '/www');
Yii::setAlias('@media', dirname(dirname(__DIR__)) . '/www/media');
Yii::setAlias('@apps', dirname(dirname(__DIR__)) . '/apps');
//Yii::setAlias('@MediaUrl', '/my-yii-adv/frontend/web/media/');
Yii::setAlias('@MediaUrl', '/media/');
