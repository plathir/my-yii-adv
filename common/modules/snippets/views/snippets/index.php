<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel common\modules\snippets\models\SnippetsSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = Yii::t('app', 'Snippets');
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="snippets-index">

    <h1><?= Html::encode($this->title) ?></h1>
    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <p>
        <?= Html::a(Yii::t('app', 'Create Snippets'), ['create'], ['class' => 'btn btn-success']) ?>
    </p>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            'id',
            'description',
            //'full_text:ntext',
            'created_by',
            'created_at:date',
            //'updated_by',
            //'updated_at',
            //'publish',

            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>
</div>
