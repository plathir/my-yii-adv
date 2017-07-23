<?php

use backend\assets\AppAsset;
use yii\helpers\Html;

/* @var $this \yii\web\View */
/* @var $content string */
backend\assets\GoogleAsset::register($this);
dmstr\web\AdminLteAsset::register($this);
?>
<?php $this->beginPage() ?>
<!DOCTYPE html>
<html lang="<?= Yii::$app->language ?>">
    <head>
        <meta charset="<?= Yii::$app->charset ?>"/>
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <?= Html::csrfMetaTags() ?>
        <title><?= Html::encode($this->title) ?></title>
        <?php $this->head() ?>
    </head>
    <body class="login-page">

        <?php $this->beginBody() ?>
        <div class="login-box">
            <div class="login-logo">
                <a href="#"><b>My-yii-adv </b>Backend</a>
            </div>
            <!-- /.login-logo -->
            <div class="login-box-body">
                <?= $content ?>
            </div>
        </div>  

        <?php $this->endBody() ?>
    </body>
</html>
<?php $this->endPage() ?>
