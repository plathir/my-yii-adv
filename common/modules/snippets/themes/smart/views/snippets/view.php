<?php

use yii\helpers\Html;
use yii\widgets\DetailView;
use yii\helpers\Markdown;
use yii\web\View;

/* @var $this yii\web\View */
/* @var $model common\modules\snippets\models\Snippets */

$this->title = $model->description;
$this->params['breadcrumbs'][] = ['label' => Yii::t('app', 'Snippets'), 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>


<div class="snippets-view">
    <div class="box box-info">
        <div class="box-header with-border">
            <h3 class="box-title"><?= Html::encode($this->title) ?></h3>
            <div class="box-tools pull-right">
                <button class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i></button>
                <button class="btn btn-box-tool" data-widget="remove"><i class="fa fa-times"></i></button>
            </div>

        </div><!-- /.box-header -->
        <div class="box-body">  
            <p>
                <?=
                Html::a(Html::tag('span', '<i class="fa fa-pencil-square-o"></i>' . '&nbsp' . Yii::t('app', 'Update'), [
                            'title' => Yii::t('app', 'Update Snippet'),
                            'data-toggle' => 'tooltip',
                        ]), ['update', 'id' => $model->id], ['class' => 'btn btn-success btn-flat btn-loader'])
                ?> 
                <?=
                Html::a(Html::tag('span', '<i class="fa fa-trash-o"></i>' . '&nbsp' . Yii::t('app', 'Delete'), [
                            'title' => Yii::t('app', 'Delete Snippet'),
                            'data-toggle' => 'tooltip',
                        ]), ['delete', 'id' => $model->id], ['class' => 'btn btn-danger btn-flat btn-loader',
                    'data-method' => 'post',
                    'data-confirm' => Yii::t('app', 'Are you sure you want to delete this item?')
                ]);

//                Html::a(Yii::t('app', 'Delete'), ['delete', 'id' => $model->id], [
//                    'class' => 'btn btn-danger btn-flat btn-loader',
//                    'data' => [
//                        'confirm' => Yii::t('app', 'Are you sure you want to delete this item?'),
//                        'method' => 'post',
//                    ],
//                ])
                ?>
            </p>

            <?=
            ''
//    DetailView::widget([
//        'model' => $model,
//        'attributes' => [
//            'id',
//            'description',
//            'full_text:ntext',
//            'created_by',
//            'created_at',
//            'updated_by',
//            'updated_at',
//            'publish',
//        ],
//    ])
            ?>
            <?= Markdown::process($model->full_text, 'gfm'); ?>
            <?php
            if ($model->example) {
                echo '<h4>Example:</h4>';
                if (file_exists(__dir__ . '/examples/' . $model->example . '.php')) {
                    include __dir__ . '/examples/' . $model->example . '.php';
                }
            }
            ?>
        </div>
    </div>


</div>

