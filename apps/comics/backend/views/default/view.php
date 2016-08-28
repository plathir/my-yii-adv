<?php

use yii\helpers\Html;
use yii\widgets\DetailView;
use apps\comics\common\widgets\GalleryWidget;

/* @var $this yii\web\View */
/* @var $model apps\comics\backend\models\Comics */

$this->title = $model->name;
$this->params['breadcrumbs'][] = ['label' => Yii::t('app', 'Comics'), 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="comics-view">

    <div class="box box-info">
        <div class="box-header with-border">
            <h3 class="box-title">View Comic : </h3>
            <div class="box-tools pull-right">
                <button class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i></button>
                <button class="btn btn-box-tool" data-widget="remove"><i class="fa fa-times"></i></button>
            </div>
        </div><!-- /.box-header -->
        <div class="box-body">
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
                'template' => '<tr><th style="width:20%">{label}</th><td style="width:80%">{value}</td></tr>',
                'attributes' => [
                    'id',
                    'name',
                    'descr:ntext',
                    [
                        'attribute' => 'cover_page',
                        'value' => $model->cover_page == '' ? '' : ( $model->module->ComicsPathPreview . '/' . $model->id . '/' . $model->cover_page),
                        'format' => $model->cover_page == '' ? 'html' : ['image', ['width' => '100', 'height' => '100']],
                    ],
                    'created_at:datetime',
                    'updated_at:datetime',
                ],
            ])
            ?>

            <?php
            echo GalleryWidget::widget([
                'galleryItems' => $model->comic_pages,
                'imagePath' => $model->module->ComicsPath . '/' . $model->id,
                'previewUrl' => $model->module->ComicsPathPreview . '/' . $model->id,
            ]);
            ?>            
        </div>
    </div>


</div>
