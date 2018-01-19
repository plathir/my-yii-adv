<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use kartik\widgets\SwitchInput;

/* @var $this yii\web\View */
/* @var $model common\modules\snippets\models\Snippets */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="snippets-form">
    <div class="box box-info">
        <div class="box-header with-border">
            <h3 class="box-title"><?= Html::encode($this->title) ?></h3>
            <div class="box-tools pull-right">
                <button class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i></button>
                <button class="btn btn-box-tool" data-widget="remove"><i class="fa fa-times"></i></button>
            </div>

        </div><!-- /.box-header -->
        <div class="box-body">     
            <?php $form = ActiveForm::begin(); ?>

            <?= $form->field($model, 'description')->textInput(['maxlength' => true]) ?>
            <?php
            echo $form->field($model, 'full_text')->widget(\yii2mod\markdown\MarkdownEditor::class, [
                'editorOptions' => [
                    'showIcons' => ["code", "table"],
                    'renderingConfig' => [
                        'codeSyntaxHighlighting' => true,
                    ]
                ],
            ]);
            ?>
            <?= $form->field($model, 'publish')->widget(SwitchInput::classname(), []); ?>
            <?= $form->field($model, 'example')->textInput() ?>

            <div class="box-footer"> 
                <div class="form-group">
                    <?= Html::submitButton(Yii::t('app', 'Save'), ['class' => 'btn btn-success']) ?>
                </div>

                <?php ActiveForm::end(); ?>
            </div>
        </div>
    </div>
</div>
