<?php

use yii\helpers\Html;
?>

<div class="box box-info">
    <div class="box-header with-border">
        <h3 class="box-title"><?= Yii::t('app', 'System Cache ') ?></h3>
        <div class="box-tools pull-right">
            <button class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i></button>
            <button class="btn btn-box-tool" data-widget="remove"><i class="fa fa-times"></i></button>
        </div>

    </div><!-- /.box-header -->
    <div class="box-body">
        <?=
        Html::a('<i class="fa fa-trash-o"></i> Backend Cashe Delete', ['deletebackendcache'], [
            'class' => 'btn btn-danger btn-flat btn-loader',
            'data' => [
                'confirm' => 'Are you sure you want to delete this item?',
                'method' => 'post',
            ],
        ])
        ?>
        <br>
        <br>
        <?=
        Html::a('<i class="fa fa-trash-o"></i> Frontend Cashe Delete', ['deletefrontendcache'], [
            'class' => 'btn btn-danger btn-flat btn-loader',
            'data' => [
                'confirm' => 'Are you sure you want to delete this item?',
                'method' => 'post',
            ],
        ])
        ?>

        <!--Yii::$app->cache->flush(); //backend flush
            Yii::$app->frontendCache->flush(); //frontend flush-->


    </div>
</div>




