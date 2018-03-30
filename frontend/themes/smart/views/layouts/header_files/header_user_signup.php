<?php

use yii\helpers\Html;
use yii\helpers\Url;

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
use \plathir\user\common\helpers\UserHelper;

$userHelper = new UserHelper();
?>
<li class="dropdown user user-menu">
    <?= Html::a('<span class="fa fa-pencil-square-o"></span><span> Signup</span>', ['/user/registration/signup']) ?>
</li>