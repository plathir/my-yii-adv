<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use kartik\datecontrol\DateControl;
use plathir\cropper\Widget as NewWidget;
use plathir\upload\Widget as UplWidget;
use yii\helpers\Url;
use yii\imagine\Image;
use Imagine\Image\Box;

/* @var $this yii\web\View */
/* @var $model apps\comics\backend\models\Comics */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="comics-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'name')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'descr')->textarea(['rows' => 6]) ?>

    <?=
    $form->field($model, 'cover_page')->widget(NewWidget::className(), [
        'uploadUrl' => Url::toRoute(['uploadphoto']),
        'previewUrl' => $model->module->ComicsPathPreview,
        'tempPreviewUrl' => $model->module->ComicsTempPathPreview,
        'KeyFolder' => $model->id,
        'width' => 600,
        'height' => 800,
        'maxSize' => 10145728,
    ]);
    ?>
    <?php
    echo $form->field($model, 'comic_pages')->widget(UplWidget::className(), [
        'uploadUrl' => Url::toRoute(['uploadfile']),
        'previewUrl' => $model->module->ComicsPathPreview,
        'tempPreviewUrl' => $model->module->ComicsTempPathPreview,
        'KeyFolder' => $model->id,
        'galleryType' => true,
    ]);
    ?>


<?php
echo $form->field($model, 'created_at')->widget(DateControl::classname(), [
    'type' => DateControl::FORMAT_DATETIME,
    'ajaxConversion' => true,
    'saveFormat' => 'php:U',
    'options' => [
        'layout' => '{picker}{input}',
        'pluginOptions' => [
            'autoclose' => true,
            'todayBtn' => true,
        ]
    ]
]);
?>
    <?php
    echo $form->field($model, 'updated_at')->widget(DateControl::classname(), [
        'type' => DateControl::FORMAT_DATETIME,
        'ajaxConversion' => true,
        'saveFormat' => 'php:U',
        'options' => [
            'layout' => '{picker}{input}',
            'pluginOptions' => [
                'autoclose' => true,
                'todayBtn' => true,
            ]
        ]
    ]);
    ?>
    <div class="form-group">
    <?= Html::submitButton($model->isNewRecord ? Yii::t('app', 'Create') : Yii::t('app', 'Update'), ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
    </div>

<?php ActiveForm::end(); ?>


</div>
