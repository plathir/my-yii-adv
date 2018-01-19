<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
$this->title = 'Send Email for test';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="site-about">
    <h1><?= Html::encode($this->title) ?></h1>

    <p>   <?= $msg; ?> </p>

    <code><?= __FILE__ ?></code>
</div>
