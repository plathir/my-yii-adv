<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
$this->title = 'Smart Settings';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="site-smart-settings">
    <h1><?= Html::encode($this->title) ?></h1>
    <div class="row">
        <h1>Smart Settings - Site Actions</h1>
        <h2> <a href="https://github.com/plathir/yii2-smart-settings">plathir/yii2-smart-settings</a></h2>
        <h3>Installation</h3>
        <pre>
            <code>
                <?php
                $str = "'modules' => [
                ... 
                           'settings' => [
                              'class' => 'plathir\settings\Module',
                              'modulename' => 'site'
                            ],
                  ...
                            'components' => [
                  ...
                          'settings' => [
                             'class' => 'plathir\settings\components\Settings',
                             'modulename' => 'site',
                           ],
                ],";
                echo $str;
                ?>        
            </code> 
        </pre> 

        <h3>Actions</h3>
        <ul>
            <li><?= Html::a('/settings', ['/settings']) ?> </li>    
            <li><?= Html::a('/settings/admin', ['/settings/admin']) ?> </li>    

        </ul>


    </div>


</div>
