<?php
/* @var $this yii\web\View */

use yii\helpers\Html;

$this->title = 'My Yii Application';
?>
<div class="site-index">

    <div class="jumbotron">
        <h2>My yii kit for start any project</h2>


    </div>

    <div class="body-content">

        <div class="row">
            <div class="col-lg-4">
                <div class="panel panel-default">
                    <!-- Default panel contents -->
                    <div class="panel-heading">
                        <h2>Smart User</h2>
                    </div>
                    <div class="panel-body">
                        <p>Smart User is a yii2 extension for user management.</p>
                        <?= Html::a('More &raquo;', ['/site/smart-user'], ['data-method' => 'post', 'class' => 'btn btn-default btn-flat']) ?>  
                    </div>
                </div>
            </div>

            <div class="col-lg-4">
                <div class="panel panel-default">
                    <!-- Default panel contents -->
                    <div class="panel-heading">
                        <h2>Smart Blog</h2>
                    </div>
                    <div class="panel-body">
                        <p>Smart Blog is a yii2 extension for blog.</p>
                        <?= Html::a('More &raquo;', ['/site/smart-blog'], ['data-method' => 'post', 'class' => 'btn btn-default btn-flat']) ?>  
                    </div>
                </div>
            </div>                

            <div class="col-lg-4">
                <div class="panel panel-default">
                    <!-- Default panel contents -->
                    <div class="panel-heading">
                        <h2>Smart Apps</h2>
                    </div>
                    <div class="panel-body">
                        <p>Smart Blog is a yii2 extension for inside Applications.</p>
                        <?= Html::a('More &raquo;', ['/site/smart-apps'], ['data-method' => 'post', 'class' => 'btn btn-default btn-flat']) ?>                          

                    </div>
                </div>
            </div>

            <div class="col-lg-4">
                <div class="panel panel-default">
                    <!-- Default panel contents -->
                    <div class="panel-heading">
                        <h2>Smart Settings</h2>
                    </div>
                    <div class="panel-body">
                        <p>Smart Settings is a yii2 extension for inside Applications.</p>
                        <?= Html::a('More &raquo;', ['/site/smart-settings'], ['data-method' => 'post', 'class' => 'btn btn-default btn-flat']) ?>                                          

                    </div>
                </div>
            </div>
        </div>
    </div>
</div>