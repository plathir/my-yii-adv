<?php

use yii\helpers\Html;
use yii\grid\GridView;
use \backend\widgets\SmartDate;

/* @var $this yii\web\View */
/* @var $searchModel common\modules\snippets\models\SnippetsSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = Yii::t('app', 'Snippets');
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="snippets-index">
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
                Html::a(Html::tag('span', '<i class="fa fa-fw fa-plus"></i>' . '&nbsp' . Yii::t('app', 'Create'), [
                            'title' => Yii::t('app', 'Create New Snippet'),
                            'data-toggle' => 'tooltip',
                        ]), ['create'], ['class' => 'btn btn-success btn-flat btn-loader'])
                ?> 
                <?= ''; // Html::a(Yii::t('app', 'Create Snippets'), ['create'], ['class' => 'btn btn-success btn-flat btn-loader']) ?>
            </p>
            <?php
            $userModel = new plathir\user\common\models\account\User();
            $user_items = \yii\helpers\ArrayHelper::map($userModel::find()->where('status = 10')->all(), 'id', 'username');
            ?>
            <?=
            GridView::widget([
                'dataProvider' => $dataProvider,
                'filterModel' => $searchModel,
                'columns' => [
                    ['attribute' => 'id',
                        'contentOptions' => ['style' => 'width: 12%;']
                    ],
                    'description',
                    [
                        'attribute' => 'created_by',
                        'value' => function($model, $key, $index, $widget) {
                            return $model->CreatedByName;
                        },
                        'format' => 'html',
                        'contentOptions' => ['style' => 'width: 10%;'],
                        'filter' => \yii\bootstrap\Html::activeDropDownList($searchModel, 'created_by', $user_items, ['class' => 'form-control', 'prompt' => 'Select...'])
                    ],
                    [
                        'attribute' => 'publish',
                        'value' => function($model, $key, $index, $widget) {
                            return $model->publishBadge;
                        },
                        'format' => 'html',
                        'filter' => \yii\bootstrap\Html::activeDropDownList($searchModel, 'publish', ['0' => 'Unpublished', '1' => 'Published'], ['class' => 'form-control', 'prompt' => 'Select...']),
                        'contentOptions' => ['style' => 'width: 10%;']
                    ],
                    [
                        'attribute' => 'created_at',
                        'format' => ['date', 'php:' . Yii::$app->settings->getSettings('ShortDateFormat')],
                        'value' => 'created_at',
                        'filter' => SmartDate::widget(['type' => 'filterShortDate', 'model' => $searchModel, 'attribute' => 'created_at']),
                        'contentOptions' => ['style' => 'width: 12%;']
                    ],
                    //'updated_by',
                    //'updated_at',
                    //'publish',
                    ['class' => 'yii\grid\ActionColumn'],
                ],
            ]);
            ?>
        </div>
    </div>
</div>
