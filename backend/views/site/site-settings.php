<?php

use yii\widgets\ActiveForm;
use yii\helpers\Html;
?>

<?php $form = ActiveForm::begin(['id' => 'site-settings-form']); ?>
<?= $form->field($model, 'siteName') ?>
<?= $form->field($model, 'siteDescription') ?>


<div class="form-group">
<?php echo Html::submitButton('<span class="glyphicon glyphicon-floppy-save" aria-hidden="true"></span> Update', ['class' => 'btn btn-primary']) ?>
</div>

<?php $form = ActiveForm::end(); ?>