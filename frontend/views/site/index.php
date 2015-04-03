<?php
/* @var $this yii\web\View */
use yii\helpers\Html;
$this->title = 'My Yii Application';
?>
<div class="site-index">

    <div class="jumbotron">
        <p>My yii Advance Frontend</p>

    </div>

    <div class="body-content">

        <div class="row">
            <?= Html::a('send mail', ['site/send']) ?>
        </div>

    </div>
</div>
