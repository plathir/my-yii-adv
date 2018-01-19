<?php
/* @var $this yii\web\View */

use yii\helpers\Html;
use plathir\user\common\helpers\UserHelper;
use plathir\smartblog\helpers\PostHelper;
use plathir\smartblog\backend\widgets\LatestPosts;
use plathir\apps\models\AppsSearch;
use plathir\apps\helpers\AppsHelper;
use plathir\widgets\common\helpers\PositionHelper;

$this->title = 'My Yii Application';
?>

<?php //echo Yii::$app->settings->test();  ?>
<?php
$comp = \Yii::$app->getModules();

$userHelper = new UserHelper();
$postHelper = new PostHelper();
$appsHelper = new AppsHelper();
$positionHelper = new PositionHelper();

$LatestUsers = $userHelper->getLatestUsers(5);
$LatestPosts = $postHelper->getLatestPosts(10);

$searchModel = new AppsSearch();
$applications = $appsHelper->getAppsList();
?>

<div class="row row-centered">

    <div class="col-md-12">
        <?php
        echo $this->render(
                'apps.php', ['applications' => $applications]
        );
        ?>
        <?= '' // Html::a('test', Yii::$app->urlManagerFrontEnd->getBaseUrl() . DIRECTORY_SEPARATOR . Yii::$app->urlManagerFrontEnd->createUrl('/blog/posts/list')) . '<br>'; ?>
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
        <?= $positionHelper->LoadPosition('be_dashboard_position1'); ?>
        <?php
//        use mdm\admin\components\MenuHelper;
//        use yii\bootstrap\Nav;
//
//        echo Nav::widget([
//            'items' => MenuHelper::getAssignedMenu(Yii::$app->user->id)
//        ]);
        ?>
    </div>

</div>