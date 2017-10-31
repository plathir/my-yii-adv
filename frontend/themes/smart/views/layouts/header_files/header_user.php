<?php

use yii\helpers\Html;

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
use \plathir\user\common\helpers\UserHelper;
$userHelper = new UserHelper();

?>
<li class="dropdown user user-menu">
    <a href="#" class="dropdown-toggle" data-toggle="dropdown">
        <img src="<?= $userHelper->getProfileImage(Yii::$app->user->identity->id, $this) ?>" class="user-image" alt="User Image"/>
        <span class="hidden-xs"><?= Yii::$app->user->identity->username; ?></span>
    </a>
    <ul class="dropdown-menu">
        <!-- User image -->
        <li class="user-header">
            <img src="<?= $userHelper->getProfileImage(Yii::$app->user->identity->id, $this) ?>" class="img-circle"
                 alt="User Image"/>

            <p>
                <?= '(' . Yii::$app->user->identity->username . ')' ?> <?= $userHelper->getProfileFullName(Yii::$app->user->identity->id) ?>
                <small>Member since <?= Yii::$app->formatter->asDatetime(Yii::$app->user->identity->created_at); ?> </small>
            </p>
        </li>
        <!-- Menu Body -->

        <!-- Menu Footer-->
        <li class="user-footer">
            <div class="pull-left">

                <?=
                Html::a(
                        'Profile', ['/user/account/my'], ['class' => 'btn btn-default btn-flat']
                );
                ?>

            </div>
            <div class="pull-right">
                <?=
                Html::a(
                        'Sign out', ['/user/security/logout'], ['data-method' => 'post', 'class' => 'btn btn-default btn-flat']
                )
                ?>
            </div>
        </li>
    </ul>
</li>