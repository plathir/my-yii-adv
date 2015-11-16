<?php

use yii\helpers\Html;
use yii\bootstrap\Nav;
use yii\bootstrap\NavBar;
use yii\widgets\Breadcrumbs;
use frontend\assets\AppAsset;
use frontend\widgets\Alert;

/* @var $this \yii\web\View */
/* @var $content string */

AppAsset::register($this);
?>
<?php $this->beginPage() ?>
<!DOCTYPE html>
<html lang="<?= Yii::$app->language ?>">
    <head>
        <meta charset="<?= Yii::$app->charset ?>">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <?= Html::csrfMetaTags() ?>
        <title><?= Html::encode($this->title) ?></title>
        <?php $this->head() ?>
    </head>
    <body>
        <?php $this->beginBody() ?>
        <div class="row">
            <div class="wrap">
                <?php
                NavBar::begin([
                    'brandLabel' => 'My Company',
                    'brandUrl' => Yii::$app->homeUrl,
                    'options' => [
                        'class' => 'navbar-inverse navbar-fixed-top',
                    ],
                ]);
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
//                    if (Yii::$app->user->can('/admin/*')) {
//                        $menuItems[] = ['label' => '<span class=""></span> Permissions ',
//                            'items' => [
//                                '<li class="divider"></li>',
//                                ['label' => '<span class="fa fa-edit"></span> Roles', 'url' => ['/admin/role']],
//                                '<li class="divider"></li>',
//                                ['label' => '<span class="fa fa-edit"></span> Routes', 'url' => ['/admin/route']],
//                                '<li class="divider"></li>',
//                                ['label' => '<span class="fa fa-edit"></span> Rules', 'url' => ['/admin/rule']],
//                                '<li class="divider"></li>',
//                                ['label' => '<span class="fa fa-sign-out"></span> Permissions', 'url' => ['/admin/permission']],
//                                '<li class="divider"></li>',
//                                ['label' => '<span class="fa fa-sign-out"></span> Assignments', 'url' => ['/admin/assignment']],
//                                '<li class="divider"></li>',
//                                ['label' => '<span class="fa fa-edit"></span> Menus', 'url' => ['/admin/menu']],
//                            ],
//                        ];
//                    }
                    $menuItems[] = ['label' => '<span class="glyphicon glyphicon-user"></span> ' . Yii::$app->user->identity->username,
                        'items' => [
                            '<li class="divider"></li>',
                            ['label' => '<span class="fa fa-edit"></span> Update Account', 'url' => ['/user/account/my']],
                            '<li class="divider"></li>',
                            ['label' => '<span class="fa fa-edit"></span> Users', 'url' => ['/user/admin/index']],
                            '<li class="divider"></li>',
                            ['label' => '<span class="fa fa-sign-out"></span> Logout', 'url' => ['/user/security/logout'],
                                'linkOptions' => ['data-method' => 'post'],
                            ],
                        ],
                    ];
                }

                echo Nav::widget([
                    'options' => ['class' => 'navbar-nav navbar-right'],
                    'items' => $menuItems,
                    'encodeLabels' => false,
                ]);
                NavBar::end();
                ?>


                <div class="container">
                    <?=
                    Breadcrumbs::widget([
                        'links' => isset($this->params['breadcrumbs']) ? $this->params['breadcrumbs'] : [],
                    ])
                    ?>

                    <?= Alert::widget() ?>
                    <?= $content ?>
                </div>
            </div>

            <footer class="footer">
                <div class="container">
                    <p class="pull-left">&copy; My Company <?= date('Y') ?></p>
                    <p class="pull-right"><?= Yii::powered() ?></p>
                </div>
            </footer>
        </div>
        <?php $this->endBody() ?>
    </body>
</html>
<?php $this->endPage() ?>
