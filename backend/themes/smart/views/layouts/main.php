<?php

use yii\helpers\Html;

/* @var $this \yii\web\View */
/* @var $content string */
use yii\web\View;

if (Yii::$app->controller->action->id === 'backend-login' || Yii::$app->controller->action->id === 'request-password-reset') {
    /**
     * Pass Login form data into main-login view
     * 
     */
    echo $this->render(
            'main-login', ['content' => $content]
    );
} elseif (!Yii::$app->user->isGuest) {

    if (class_exists('backend\assets\AppAsset')) {
        backend\assets\AppAsset::register($this);
    } else {
        app\assets\AppAsset::register($this);
    }

    backend\assets\GoogleAsset::register($this);
    backend\assets\CodeHighlight::register($this);

    dmstr\web\AdminLteAsset::register($this);

    $directoryAsset = Yii::$app->assetManager->getPublishedUrl('@vendor/almasaeed2010/adminlte/dist');
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
        <body class="hold-transition skin-blue sidebar-mini" onload="$('#loader').hide();">            
            <?php $this->beginBody() ?>
            <div class="wrapper">

                <?=
                $this->render(
                        'header.php', ['directoryAsset' => $directoryAsset]
                )
                ?>

                <?=
                $this->render(
                        'left.php', ['directoryAsset' => $directoryAsset]
                )
                ?>

                <?=
                $this->render(
                        'content.php', ['content' => $content, 'directoryAsset' => $directoryAsset]
                )
                ?>

            </div>

            <?php $this->endBody() ?>

            <?php
            // Enable Loader icon 
            $this->registerJs(
                    "$(document).ready(function () {
                    //When clicking on a button, it shows the loader
                    $('.btn-loader').on('click', function () {
                        $('#loader').show();
                    });
                });", View::POS_END
            );
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
    <?php
} else {
    echo $this->render(
            'main-blank', ['content' => $content]
    );
}
?>
