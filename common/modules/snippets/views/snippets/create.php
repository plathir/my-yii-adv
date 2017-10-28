<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model common\modules\snippets\models\Snippets */

$this->title = Yii::t('app', 'Create Snippets');
$this->params['breadcrumbs'][] = ['label' => Yii::t('app', 'Snippets'), 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="snippets-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
