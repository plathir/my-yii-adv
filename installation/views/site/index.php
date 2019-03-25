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

<div class="row">
    <?php
    $form = ActiveForm::begin(['id' => 'install-form',
                'action' => ['site/ajax-db-install'],
                'options' => [
                    'class' => 'install-form'
                ]
    ]);
    ?>

    <?= $form->field($model, 'appname'); ?>
    <?= $form->field($model, 'database'); ?>
    <?= $form->field($model, 'username'); ?>
    <?= $form->field($model, 'password'); ?>
    <?= Html::submitButton('install', ['class' => 'btn btn-success']) ?>

    <?php ActiveForm::end() ?>

    <?php
    $token = Yii::$app->request->getCsrfToken();
    
    $js = <<< JS
 jQuery(document).ready(function($) {
       $(".install-form").submit(function(event) {
            event.preventDefault(); // stopping submitting
            var data1 = $(this).serializeArray();
              
            var url = $(this).attr('action');
            $.ajax({
                url: url,
                type: 'post',
                dataType: 'json',
                data: {
                     data1,
      //               _csrf : $token 
                  }
            
            
            })
            .done(function(response) {
                if (response.data.success == true) {
                    alert("Wow you commented");
                }
            })
            .fail(function() {
                console.log(url+"error");
            });
        
        });
    });
JS;



    $this->registerJs($js);
    ?>
</div>

