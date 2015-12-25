<?php

use yii\helpers\Html;
?>


<!-- DIRECT CHAT PRIMARY -->
<div class="box box-primary">
    <div class="box-header with-border">
        <h3 class="box-title">Applications</h3>

    </div><!-- /.box-header -->
    <div class="box-body">
        <?php foreach ($applications as $application) { ?>
            <?php
            $bundle = null;
            $h_text = '$bundle = apps' . '\\' . $application->name . '\\backend\\' . $application->name . 'Asset::register($this);';
            eval($h_text);

            $img = $bundle->baseUrl . $application->app_icon;
            ?>
            <div class="col-lg-2 col-md-4 col-xs-12" >
                <div class="row row-centered">
                    <?php
                    echo Html::a(Html::img($img, ['alt' => '...',
                                'width' => '80',
                                    ]
                            ), ["/$application->name"], ['class' => 'btn btn-default']);
                    ?>
                    <p><strong><?= $application->descr ?></strong></p>

                </div>
            </div>            
        <?php } ?>

    </div><!-- /.box-body -->
    <div class="box-footer">
        Test footer
    </div><!-- /.box-footer-->
</div><!--/.direct-chat -->
