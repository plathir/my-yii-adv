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

echo Nav::widget([
    'encodeLabels' => false,
    'options' => ['class' => 'navbar-nav navbar-left', 'display' => 'inline-block', 'white-space' => 'nowrap'],
    'items' => $menuItemsLeft,
]);

echo Nav::widget([
    'encodeLabels' => false,
    'options' => ['class' => 'navbar-nav navbar-left', 'display' => 'inline-block', 'white-space' => 'nowrap'],
    'items' => $menuAppItemsLeft,
]);

$url = Url::toRoute(['/site/search']);
$search_html = '<form action="' . $url . '" method="get" class="navbar-form navbar-nav navbar-left" role = "search"> 
    <div class="form-group">
        <input type="text" name="q" class="form-control navbar-nav navbar-left" id="navbar-search-input" placeholder="Search">
    </div>
    <button type="submit" class="btn btn-default"><i class="fa fa-search" aria-hidden="true"></i></button>
</form>';
echo $search_html;
?>

<ul class="nav navbar-nav navbar-right">
    <?php
    //require('header_files/header_about.php');
   // require('header_files/header_contact.php');
    if (!Yii::$app->user->isGuest) {
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
</ul>
<?php

NavBar::end();

