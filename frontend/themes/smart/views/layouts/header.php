<?php

use yii\helpers\Html;
use yii\bootstrap\Nav;
use yii\bootstrap\NavBar;
use yii\helpers\Url;
use yii\bootstrap\Dropdown;

/* @var $this \yii\web\View */
/* @var $content string */

NavBar::begin([
    'brandLabel' => Yii::$app->settings->getSettings('ApplicationName'),
    'brandUrl' => Yii::$app->homeUrl,
    'options' => [
        'class' => 'navbar-default',
        'display' => 'inline-block',
        'white-space' => 'nowrap',
    ],
]);


$menuItemsLeft = [
    ['label' => '<i class="fa fa-book" aria-hidden="true"></i> Blog', 'url' => ['/blog']],
];
$appsItems = new \frontend\helpers\AppsMenuHelper();
$menuAppItemsLeft = $appsItems->getFrontendMenu($this);

$menuItemsRight = [
    ['label' => 'About', 'url' => ['/site/about']],
    ['label' => 'Contact', 'url' => ['/site/contact']],
];
if (Yii::$app->user->isGuest) {
    $menuItemsRight[] = ['label' => 'Signup', 'url' => ['/site/signup']];
    $menuItemsRight[] = ['label' => 'Login', 'url' => ['/site/login']];
} else {
    $menuItems[] = '<li>'
            . Html::beginForm(['/site/logout'], 'post')
            . Html::submitButton(
                    'Logout (' . Yii::$app->user->identity->username . ')', ['class' => 'btn btn-link logout']
            )
            . Html::endForm()
            . '</li>';
}
echo Nav::widget([
    'encodeLabels' => false,
    'options' => ['class' => 'navbar-nav navbar-left', 'display' => 'inline-block',  'white-space' => 'nowrap'],
    'items' => $menuItemsLeft,
]);

echo Nav::widget([
    'encodeLabels' => false,
    'options' => ['class' => 'navbar-nav navbar-left', 'display' => 'inline-block',  'white-space' => 'nowrap'],
    'items' => $menuAppItemsLeft,
]);

$url = Url::toRoute(['/site/search']);
$search_html = '<form action="' . $url . '" method="get" class="navbar-form navbar-nav navbar-left" role = "search"> 
    <div class="form-group">
        <input type="text" name="q" class="form-control navbar-nav navbar-left" id="navbar-search-input" placeholder="Search">
    </div>
</form>';
echo $search_html;


?>

                <ul class="nav navbar-nav navbar-right">
                    <?php if (!Yii::$app->user->isGuest) { ?>
                        <!-- Messages: style can be found in dropdown.less-->
                        <?php //require('header_files/header_messages.php'); ?>
                        <!-- Notifications -->
                        <?php //require('header_files/header_notifications.php'); ?>

                        <!-- Tasks: style can be found in dropdown.less -->
                        <?php //require('header_files/header_tasks.php'); ?>

                        <!-- User Account: style can be found in dropdown.less -->
                        <?php
                        require('header_files/header_user.php');
                    } else {
                        require('header_files/header_user_signup.php');
                        ?>
                        <li>
                            <?php
                            require('header_files/header_user_login.php');
                            ?>
                        </li>

                    <?php } ?>

<?php

//echo Nav::widget([
//    'encodeLabels' => false,
//    'options' => ['class' => 'navbar-nav navbar-right', 'display' => 'inline-block',  'white-space' => 'nowrap'],
//    'items' => $menuItemsRight,
//]);


NavBar::end();

