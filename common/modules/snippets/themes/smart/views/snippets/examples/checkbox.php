<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

use yii\widgets\ActiveForm;
use kartik\widgets\SwitchInput;

$exampleModel = new common\modules\snippets\models\Examples();
$form = ActiveForm::begin();
?>
<?= $form->field($exampleModel, 'publish')->widget(SwitchInput::classname(), []); ?>
<?php ActiveForm::end(); ?>