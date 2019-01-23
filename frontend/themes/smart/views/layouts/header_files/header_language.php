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
        <i class="fa fa-flag">&nbsp;<?= Yii::$app->language ?></i>
    </a>
    <ul class="dropdown-menu">
        <li>
            <!-- inner menu: contains the actual data -->
            <ul class="list-unstyled">
                <li>
                    <?= Html::a(\Yii::t('app', 'English'), Url::toRoute(['/site/changelang', 'language' => 'en'])) ?>
                </li>
                <li>
                    <?= Html::a(\Yii::t('app', 'Greek'), Url::toRoute(['/site/changelang', 'language' => 'el'])) ?>
                </li>
            </ul>
        </li>
    </ul>
</li>