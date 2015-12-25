<?php

use yii\helpers\Html;
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
                    <img src="<?php echo \plathir\user\helpers\UserHelper::getProfileImage($user['id'], $this) ?>"User Image">
                         <a class="users-list-name" <?= Html::a($user['username'], ['/user/admin/view', 'id' => $user['id']]) ?></a>
                    <span class="users-list-date"><?= Yii::$app->formatter->asDate($user['created_at']) ?> </span>
                </li>
                <?php
            }
            ?>
        </ul><!-- /.users-list -->
    </div><!-- /.box-body -->
    <div class="box-footer text-center">
        <?= Html::a(Yii::t('app', 'View All Users'), ['/user/admin'], ['class' => 'uppercase']) ?>
    </div><!-- /.box-footer -->
</div><!--/.box -->
