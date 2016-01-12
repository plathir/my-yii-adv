<?php

use yii\helpers\Html;
?>

<div>
    <div class="col-md-12">
        <!-- USERS LIST -->
        <div class="box box-danger">
            <div class="box-header with-border">
                <h3 class="box-title">Latest Recipes</h3>
                <div class="box-tools pull-right">
                    <span class="label label-danger">8 New Recipes</span>
                    <button class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i></button>
                    <button class="btn btn-box-tool" data-widget="remove"><i class="fa fa-times"></i></button>
                </div>
            </div><!-- /.box-header -->
            <div class="box-body no-padding">


            </div><!-- /.box-body -->
            <div class="box-footer text-center">
                <?php echo
                Html::a(Yii::t('app', 'View All Recipes'), ['/recipes/recipes/index'], ['class' => 'upercase'])
                        ?>
               
            </div><!-- /.box-footer -->
        </div><!--/.box -->
    </div><!-- /.col -->
</div><!-- /.row -->