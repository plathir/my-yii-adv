<?php

use yii\helpers\Html;
use plathir\user\common\helpers\UserHelper;

$userHelper = new UserHelper();
?>

<!-- USERS LIST -->
<div class="box box-danger">
    <div class="box-header with-border">
        <h3 class="box-title">Latest Members</h3>
        <div class="box-tools pull-right">
            <button class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i></button>
            <button class="btn btn-box-tool" data-widget="remove"><i class="fa fa-times"></i></button>
        </div>
    </div><!-- /.box-header -->
    <div class="box-body no-padding">
        <ul class="users-list clearfix">
            <?php foreach ($LatestUsers as $user) { ?>
                <li>
                    <img src="<?= $userHelper->getProfileImage($user['id'], $this) ?>" alt="User Image">
                    <span><?= Html::a($user['username'], ['/user/admin/view', 'id' => $user['id']], ['class' => "users-list-name"]) ?></span>
                    <span class="users-list-date"><?= Yii::$app->formatter->asDate($user['created_at'], 'dd-MM-yyyy') ?></span>
                </li>
                <?php
            }
            ?>


            <li>
                <?= Html::a(Yii::t('app', '<img src="' . $userHelper->getAddUserImage($user['id'], $this) . '" title ="Create New User" >'), ['/user/admin/create']) ?>  
                <span><?= Html::a('New User', ['/user/admin/create'], ['class' => "users-list-name"]) ?></span>
            </li>                    

            </li>
        </ul><!-- /.users-list -->
    </div><!-- /.box-body -->
    <div class="box-footer text-center">

        <?= Html::a(Yii::t('app', 'View All Users'), ['/user/admin'], ['class' => 'uppercase right']) ?>
    </div><!-- /.box-footer -->
</div><!--/.box -->
