<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model common\modules\snippets\models\Snippets */

$this->title = Yii::t('app', 'Update Snippets: {nameAttribute}', [
            'nameAttribute' => $model->description,
        ]);
$this->params['breadcrumbs'][] = ['label' => Yii::t('app', 'Snippets'), 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->description, 'url' => ['view', 'id' => $model->id]];
$this->params['breadcrumbs'][] = Yii::t('app', 'Update');
?>
<div class="snippets-update">

    <?=
    $this->render('_form', [
        'model' => $model,
    ])
    ?>

</div>
