<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel apps\comics\backend\models\ComicsSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = Yii::t('app', 'Comics');
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="comics-index">

    <div class="box box-danger">
        <div class="box-header with-border">
            <h3 class="box-title">Comics</h3>
            <div class="box-tools pull-right">
                <button class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i></button>
                <button class="btn btn-box-tool" data-widget="remove"><i class="fa fa-times"></i></button>
            </div>
        </div><!-- /.box-header -->
        <div class="box-body">
            <?= Html::a(Yii::t('app', '<i class="fa fa-folder-open"></i>File Manager'), ['filemanager'], ['class' => 'btn btn-app']) ?>
            <?= Html::a(Yii::t('app', '<i class="fa fa-gears"></i>Settings'), ['/comics/settings'], ['class' => 'btn btn-app']) ?>
        </div>
    </div>

    <div class="box box-info">
        <div class="box-header with-border">
            <h3 class="box-title">Comics</h3>
            <div class="box-tools pull-right">
                <button class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i></button>
                <button class="btn btn-box-tool" data-widget="remove"><i class="fa fa-times"></i></button>
            </div>
        </div><!-- /.box-header -->
        <div class="box-body">
            <?= Html::a(Yii::t('app', 'New'), ['create'], ['class' => 'btn btn-success']) ?>
            <?=
            GridView::widget([
                'dataProvider' => $dataProvider,
                'filterModel' => $searchModel,
                'columns' => [
//                    ['class' => 'yii\grid\SerialColumn'],

                    [
                        'header' => 'Cover',
                        'format' => 'raw',
                        'value' => function($model, $key, $index, $grid) {
                            if ($model->cover_page) {

                                $image_html = Html::img($model->module->ComicsPathPreview . '/' . $model->id . '/' . 'thumbs/' . $model->cover_page, ['alt' => '...',
                                            //  'class' => 'img-circle',
                                            'width' => '100',
                                            'align' => 'center']);
                                return Html::a($image_html, ['view', 'id' => $model->id]);
                            }
                        }
                            ],
                            'id',
                            'name',
                            'descr:ntext',
                            'created_at:datetime',
                            'updated_at:datetime',
                            ['class' => 'yii\grid\ActionColumn',
                                'contentOptions' => ['style' => 'min-width: 70px;']
                            ],
                        ],
                    ]);
                    ?>
        </div>
    </div>
</div>

