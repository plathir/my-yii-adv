<?php
/* @var $this yii\web\View */

use yii\helpers\Html;

$this->title = 'My Yii Application';
?>

<?php //echo Yii::$app->settings->test();  ?>
<?php
$comp = \Yii::$app->getModules();

$LatestUsers = \plathir\user\helpers\UserHelper::getLatestUsers(5);
$LatestPosts = \plathir\smartblog\helpers\PostHelper::getLatestPosts(10);

$searchModel = new plathir\apps\models\AppsSearch();
$applications = plathir\apps\helpers\AppsHelper::getAppsList();
?>

<div class="row row-centered">

    <div class="col-md-12">
        <?php
        echo $this->render(
                'apps.php', ['applications' => $applications]
        )
        ?>
        <?= Html::a('test', Yii::$app->urlManagerFrontEnd->getBaseUrl() . DIRECTORY_SEPARATOR . Yii::$app->urlManagerFrontEnd->createUrl('/blog/posts/list')) . '<br>'; ?>
    </div>
</div>

<div class="row">
    <div class="col-md-4">
        <?php
        echo $this->render(
                'latest_members.php', ['LatestUsers' => $LatestUsers]
        )
        ?>

    </div>


    <div class="col-md-8">
        <?php
        echo $this->render(
                'latest_posts.php', ['LatestPosts' => $LatestPosts]
        )
        ?>

    </div>

</div>