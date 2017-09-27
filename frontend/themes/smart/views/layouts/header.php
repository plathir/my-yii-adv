    <?php

use yii\helpers\Html;
use yii\bootstrap\Nav;
use yii\helpers\Url;

/* @var $this \yii\web\View */
/* @var $content string */
?>

<header class="main-header">
    <nav class="navbar navbar-static-top">

        <div class="navbar-header">
            <?= Html::a('<span class="logo-mini">APP</span><span>' . Yii::$app->name . '</span>', Yii::$app->homeUrl, ['class' => 'logo']) ?>
            <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar-collapse">
                <i class="fa fa-bars"></i>
            </button>
        </div>

        <!-- Collect the nav links, forms, and other content for toggling -->
        <div class="collapse navbar-collapse" id="navbar-collapse">
            <?=
            $this->render(
                    'apps.php', ['directoryAsset' => $directoryAsset]
            )
            ?>
            <?php $url = Url::toRoute(['/site/search']) ?>
          <form action="<?= $url ?>" method="get" class="navbar-form navbar-left" role = "search">  
            <div class="form-group">
              <input type="text" name="q" class="form-control" id="navbar-search-input" placeholder="Search">
            </div>
          </form>
            <div class="navbar-custom-menu">
                <ul class="nav navbar-nav">
                    <?php if (!Yii::$app->user->isGuest) { ?>
                        <!-- Messages: style can be found in dropdown.less-->
                        <?php require('header_files/header_messages.php'); ?>
                        <!-- Notifications -->
                        <?php require('header_files/header_notifications.php'); ?>

                        <!-- Tasks: style can be found in dropdown.less -->
                        <?php require('header_files/header_tasks.php'); ?>

                        <!-- User Account: style can be found in dropdown.less -->
                        <?php
                        require('header_files/header_user.php');
                    } else {
                        require('header_files/header_user_signup.php'); ?>
                        <li>
                        <?php
                        require('header_files/header_user_login.php');
                            ?>
                        </li>

                    <?php } ?>


                    <li>
                        <!--  Uncomment to enable sidebar
                        <a href="#" data-toggle="control-sidebar"><i class="fa fa-gears"></i></a>-->
                    </li>
                </ul>
            </div>

        </div>
        <!-- /.navbar-collapse -->

        <!-- /.container-fluid -->
    </nav>
</header>