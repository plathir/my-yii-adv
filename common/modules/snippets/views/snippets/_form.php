<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model common\modules\snippets\models\Snippets */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="snippets-form">

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

    <?= $form->field($model, 'created_by')->textInput() ?>

    <?= $form->field($model, 'created_at')->textInput() ?>

    <?= $form->field($model, 'updated_by')->textInput() ?>

    <?= $form->field($model, 'updated_at')->textInput() ?>

        <?= $form->field($model, 'publish')->textInput(['maxlength' => true]) ?>

    <div class="form-group">
    <?= Html::submitButton(Yii::t('app', 'Save'), ['class' => 'btn btn-success']) ?>
    </div>

<?php ActiveForm::end(); ?>

</div>
