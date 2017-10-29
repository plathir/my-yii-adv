<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model common\modules\snippets\models\Snippets */

$this->title = Yii::t('app', 'Create Snippet');
$this->params['breadcrumbs'][] = ['label' => Yii::t('app', 'Snippets'), 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="snippets-create">

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
