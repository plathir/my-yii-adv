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

frontend\assets\GoogleAsset::register($this);
//dmstr\web\AdminLteAsset::register($this);
//frontend\assets\AdminLtePluginAsset::register($this);
//
//if (class_exists('frontend\assets\AppAsset')) {
//    frontend\assets\AppAsset::register($this);
//} else {
//    app\assets\AppAsset::register($this);
//}

frontend\assets\AppAsset::register($this);
frontend\assets\CodeHighlight::register($this);

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


        <!--        <div id="disqus_thread"></div>-->
        <?php
        $js = " 
            /**
             *  RECOMMENDED CONFIGURATION VARIABLES: EDIT AND UNCOMMENT THE SECTION BELOW TO INSERT DYNAMIC VALUES FROM YOUR PLATFORM OR CMS.
             *  LEARN WHY DEFINING THESE VARIABLES IS IMPORTANT: https://disqus.com/admin/universalcode/#configuration-variables*/
            /*
             var disqus_config = function () {
             this.page.url = PAGE_URL;  // Replace PAGE_URL with your page's canonical URL variable
             this.page.identifier = PAGE_IDENTIFIER; // Replace PAGE_IDENTIFIER with your page's unique identifier variable
             };
             */
            (function () { // DON'T EDIT BELOW THIS LINE
                var d = document, s = d.createElement('script');
                s.src = 'https://developerpagesgr.disqus.com/embed.js';
                s.setAttribute('data-timestamp', +new Date());
                (d.head || d.body).appendChild(s);
            })();
        ";
//        $this->registerJs(
//                $js, View::POS_END);
        ?>


    </body>
</html>
<?php $this->endPage() ?>
<?php // }  ?>
