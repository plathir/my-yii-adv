<?php

use yii\helpers\Html;
use yii\widgets\DetailView;
use yii\helpers\Markdown;

/* @var $this yii\web\View */
/* @var $model common\modules\snippets\models\Snippets */

$this->title = $model->id;
$this->params['breadcrumbs'][] = ['label' => Yii::t('app', 'Snippets'), 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="snippets-view">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a(Yii::t('app', 'Update'), ['update', 'id' => $model->id], ['class' => 'btn btn-primary']) ?>
        <?=
        Html::a(Yii::t('app', 'Delete'), ['delete', 'id' => $model->id], [
            'class' => 'btn btn-danger',
            'data' => [
                'confirm' => Yii::t('app', 'Are you sure you want to delete this item?'),
                'method' => 'post',
            ],
        ])
        ?>
    </p>

    <?=
    DetailView::widget([
        'model' => $model,
        'attributes' => [
            'id',
            'description',
            'full_text:ntext',
            'created_by',
            'created_at',
            'updated_by',
            'updated_at',
            'publish',
        ],
    ])
    ?>

    <?= Markdown::process($model->full_text, 'gfm'); ?>
    <?=
    \altiore\yii2\markdown\Markdown::convert($model->full_text, ['renderingConfig' => [
            'codeSyntaxHighlighting' => true,
        ]]
    );
    ?>


</div>
