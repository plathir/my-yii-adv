<?php
/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

use yii\helpers\Html;
use yii\helpers\Url;
?> 
<li class="dropdown">
    <a href="#" class="dropdown-toggle" data-toggle="dropdown">
        <i class="fa fa-flag">&nbsp;<?= strtoupper(Yii::$app->language) ?></i>
    </a>
    <!--<div class="dropdown-menu">-->
        <!--        <li class="header">Choose Language</li>-->
        <!-- inner menu: contains the actual data -->
        <ul class="dropdown-menu">
            <li><?= Html::a(\Yii::t('app', 'English'), Url::toRoute(['/site/changelang', 'language' => 'en'])) ?></li>
            <li><?= Html::a(\Yii::t('app', 'Greek'), Url::toRoute(['/site/changelang', 'language' => 'el'])) ?></li>
            
        </ul>
<!--        <div class="list">
            <?=''// Html::a(\Yii::t('app', 'English'), Url::toRoute(['/site/changelang', 'language' => 'en']), ['class' => 'list-group-item']) ?>
            <?=''// Html::a(\Yii::t('app', 'Greek'), Url::toRoute(['/site/changelang', 'language' => 'el']), ['class' => 'list-group-item']) ?>
        </div>-->

<!--    </div>-->
</li>