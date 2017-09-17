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
        <span class="glyphicon glyphicon-user"></span><span class="hidden-xs">Login</span>
    </a>
    <ul class="dropdown-menu">
        <!-- User image -->

        <!-- Menu Body -->
        <li class="user-body">
            
            <?= plathir\user\frontend\widgets\LoginWidget::widget([]); ?>

        </li>
        <!-- Menu Footer-->
        <li class="user-footer">
        </li>
    </ul>
</li>