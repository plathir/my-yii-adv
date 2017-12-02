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

<li class="dropdown">
    <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false"><img class="img-circle nav-user-image" src="<?= $userHelper->getProfileImage(Yii::$app->user->identity->id, $this) ?>"> <?= Yii::$app->user->identity->username ?> <span class="caret"></span></a>
    <ul class="dropdown-menu navbar-user-dropdown">
        <li>
            <div class="nav-user-image-dropdown-box">
                <div class="nav-user-image-dropdown">
                    <img class="img-circle img-responsive" src="<?= $userHelper->getProfileImage(Yii::$app->user->identity->id, $this) ?>">
                </div>
                <div class="nav-user-name-dropdown">
                    <div class="container">
                        <div class="row">
                            <div class="col-lg-12">
                                <?= '( ' . Yii::$app->user->identity->username . ' ) ' . $userHelper->getProfileFullName(Yii::$app->user->identity->id) ?>

                            </div>
                            <div class="col-lg-12">
                                <small>Member since <?= Yii::$app->formatter->asDatetime(Yii::$app->user->identity->created_at); ?></small>
                            </div>
                        </div>
                    </div>
                </div>

            </div>
        </li>  
        <li>
            <div class="container">
                <div class="row" style = "background-color: white">
                    <div class="nav-user-buttons-dropdown">
                        <div class="col-lg-12 ">
                            <?=
                            Html::a(
                                    '<i class="fa fa-edit" aria-hidden="true"></i> Profile', ['/user/account/my'], ['class' => 'btn btn-default pull-left']
                            );
                            ?>
                            <?=
                            Html::a(
                                    'Sign out', ['/user/security/logout'], ['data-method' => 'post', 'class' => 'btn btn-default pull-right']
                            )
                            ?>
                        </div>
                    </div>  
                </div>
            </div>
    </ul>
</li>