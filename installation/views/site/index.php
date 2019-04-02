<?php
/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

use yii\helpers\Html;
use yii\bootstrap\ActiveForm;
?>
<h2>SmartByii Installation </h2>
<hr>

<div class="row vertical-divider">
    <div class="col-lg-6 col-md-6 col-sm-6">
        <?php
        $form = ActiveForm::begin(['id' => 'install-form1',
                    'layout' => 'horizontal',
                    'options' => [
                        'class' => 'install-form'
                    ]
        ]);
        ?>
        <?= Html::submitButton('install', ['id' => 'btnSubmit', 'class' => 'btn btn-success']) ?>
        <?= $form->field($model, 'appname'); ?>
        <?= $form->field($model, 'dbhost'); ?>
        <?= $form->field($model, 'database'); ?>
        <?= $form->field($model, 'username'); ?>
        <?= $form->field($model, 'password'); ?>
        <?= $form->field($model, 'prefix'); ?>
        <?php $selval = ['prod' => 'Productive', 'dev' => 'Development']; ?>
        <?= $form->field($model, 'environment')->dropDownList($selval, ['prompt' => '.. Select Enviromnemt']);
        ?>
        <h4>SMTP Mailer</h4>
        <hr> 
        <?= $form->field($model, 'smtp_host'); ?>
        <?= $form->field($model, 'smtp_user'); ?>
        <?= $form->field($model, 'smtp_password'); ?>
        <?= $form->field($model, 'smtp_port'); ?>
        <?= $form->field($model, 'smtp_encryption'); ?>



        <?php ActiveForm::end() ?>
    </div>
    <div class="col-lg-6 col-md-6 col-sm-6 ">
        <h4>The Installation Procedure executes the following steps :</h4>
        <ul>
            <li>Set Database connection data</li>
            <li>Set Application Name</li>
            <li>Copy Migration files for each module that used</li>
            <li>Execute Migrations</li>
            <li>Import necessary data for application ( admin user , Roles , Permissions , Menus , etc..) </li>
            <li>Set Environment ( Development, Productive ) </li>
            <li>Set site email credentials ( for signup user , notifications, etc ) </li>
        </ul>

        <h4>Requirements :</h4>

    </div>
</div>

