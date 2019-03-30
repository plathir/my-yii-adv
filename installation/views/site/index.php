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
    $form = ActiveForm::begin(['id' => 'install-form1',
                'action' => ['site/ajax-install'],
//                'enableClientValidation' => true,
                'options' => [
                    'class' => 'install-form'
                ]
    ]);
    ?>

    <?= $form->field($model, 'appname'); ?>
    <?= $form->field($model, 'database'); ?>
    <?= $form->field($model, 'username'); ?>
    <?= $form->field($model, 'password'); ?>
    <?= $form->field($model, 'prefix'); ?>
    <?= Html::submitButton('install', ['id' => 'btnSubmit', 'class' => 'btn btn-success']) ?>

    <?php ActiveForm::end() ?>
    <br>
    <div class="resultsdiv">

    </div>
</div>
<hr>
<div class="import" >
    <div class="row">
        <?php
        $form = ActiveForm::begin(['id' => 'install-form2',
                    'action' => ['site/ajax-install-import'],
//                'enableClientValidation' => true,
                    'options' => [
                        'class' => 'install-form-import'
                    ]
        ]);
        ?>

        <?= $form->field($modelImport, 'import')->checkBox(); ?>
        <?= Html::submitButton('import', ['id' => 'btnSubmit', 'class' => 'btn btn-success']) ?>

        <?php ActiveForm::end() ?>
        <br>
        <div class="importresultsdiv">

        </div>    
    </div>
</div>
<?php
$token = Yii::$app->request->getCsrfToken();

//$js = __DIR__ . '/install.js';
//$this->registerJsFile($js);
?>

