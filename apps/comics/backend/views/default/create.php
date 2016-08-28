<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model apps\comics\backend\models\Comics */

$this->title = Yii::t('app', 'Create Comics');
$this->params['breadcrumbs'][] = ['label' => Yii::t('app', 'Comics'), 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="comics-create">

    <div class="box box-info">
        <div class="box-header with-border">
            <h3 class="box-title">Insert Values to create new Comic : </h3>
            <div class="box-tools pull-right">
                <button class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i></button>
                <button class="btn btn-box-tool" data-widget="remove"><i class="fa fa-times"></i></button>
            </div>
        </div><!-- /.box-header -->
        <div class="box-body">
            <?=
            $this->render('_form', [
                'model' => $model,
            ])
            ?>       

        </div>
    </div>


</div>
