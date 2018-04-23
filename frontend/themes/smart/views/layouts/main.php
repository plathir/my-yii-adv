<?php

use yii\helpers\Html;
use yii\web\View;

/* @var $this \yii\web\View */
/* @var $content string */


//if (Yii::$app->controller->action->id === 'login') {
/**
 * Do not use this code in your template. Remove it. 
 * Instead, use the code  $this->layout = '//main-login'; in your controller.
 */
//    echo $this->render(
//            'main-login', ['content' => $content]
//    );
//} else {

frontend\assets\themes\smart\GoogleAsset::register($this);
//dmstr\web\AdminLteAsset::register($this);
//frontend\assets\AdminLtePluginAsset::register($this);
//
//if (class_exists('frontend\assets\AppAsset')) {
//    frontend\assets\AppAsset::register($this);
//} else {
//    app\assets\AppAsset::register($this);
//}

frontend\assets\themes\smart\AppAsset::register($this);
frontend\assets\themes\smart\CodeHighlight::register($this);

//$directoryAsset = Yii::$app->assetManager->getPublishedUrl('@vendor/almasaeed2010/adminlte/dist');
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
    <body>
        <?php $this->beginBody() ?>
        <div class="wrap">

            <?=
            $this->render(
                    'header.php'
            )
            ?>

            <?=
            $this->render(
                    'content.php', ['content' => $content]
            )
            ?>

        </div>

        <?php $this->endBody() ?>
        <?php
        // Fade Out Alert Message 

        $this->registerJs("$(document).ready(function () {
                    setTimeout(function () {
                        $('#alert').fadeOut()
                    }, 5000);
                });", View::POS_END
        );
        ?>

        <?php
        // Code Syntax highlight
        $this->registerJs(
                "hljs.initHighlightingOnLoad();", View::POS_END);
        ?>

    </body>
</html>
<?php $this->endPage() ?>
<?php // } ?>
