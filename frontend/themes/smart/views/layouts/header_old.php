<?php

use yii\helpers\Html;
use yii\bootstrap\Nav;

/* @var $this \yii\web\View */
/* @var $content string */
?>

<header class="main-header">
    <nav class="navbar navbar-static-top" role="navigation">

        <?= Html::a('<span class="logo-mini">APP</span><span class="logo-lg">' . Yii::$app->name . '</span>', Yii::$app->homeUrl, ['class' => 'logo']) ?>

        <div class="navbar-custom-menu">

            <ul class="nav navbar-nav">

                <!-- Messages: style can be found in dropdown.less-->
                <?php require('header_files/header_messages.php'); ?>
                <!-- Notifications -->
                <?php require('header_files/header_notifications.php'); ?>

                <!-- Tasks: style can be found in dropdown.less -->
                <?php require('header_files/header_tasks.php'); ?>

                <!-- User Account: style can be found in dropdown.less -->
                <?php
                if (!Yii::$app->user->isGuest) {

                    require('header_files/header_user.php');
                } else {
                    require('header_files/header_user_login.php');
                    ?>

                <?php } ?>


                <li>
                    <!--  Uncomment to enable sidebar
                    <a href="#" data-toggle="control-sidebar"><i class="fa fa-gears"></i></a>-->
                </li>
            </ul>
        </div>
        <?php
        $menuItems = [
            ['label' => 'Home', 'url' => ['/site/index']],
            ['label' => 'About', 'url' => ['/site/about']],
            ['label' => 'Contact', 'url' => ['/site/contact']],
            ['label' => 'Blog', 'url' => ['/blog/posts/list']],
        ];

        if (Yii::$app->user->isGuest) {
            $menuItems[] = ['label' => 'Signup', 'url' => ['/user/registration/signup']];
            $menuItems[] = ['label' => 'Login', 'url' => ['/user/security/login']];
        } else {

            $menuItems[] = ['label' => '<span class="glyphicon glyphicon-user"></span> ' . Yii::$app->user->identity->username,
                'items' => [
                    '<li class="divider"></li>',
                    ['label' => '<span class="fa fa-edit"></span> Update Account', 'url' => ['/user/account/my']],
                    '<li class="divider"></li>',
                    ['label' => '<span class="fa fa-sign-out"></span> Logout', 'url' => ['/user/security/logout'],
                        'linkOptions' => ['data-method' => 'post'],
                    ],
                ],
            ];
            // require('header_files/header_user.php');
        }
//   User Account: style can be found in dropdown.less -->
//        echo Nav::widget([
//            'options' => ['class' => 'navbar-nav navbar-right'],
//            'items' => $menuItems,
//            'encodeLabels' => false,
//        ]);
        ?>
    </nav>
</header>
