<?php 


use yii\helpers\Markdown;
?>


<section class="content-header">
    <h1>
        My yii2 kit 
        <small> for start any web application </small>
    </h1>
    <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
        <li><a href="#">Layout</a></li>
        <li class="active">Top Navigation</li>
    </ol>
</section>

<!-- Main content -->
<section class="content">
    <div class="row-fluid">
        <div class="content-body">
            <div class="box box-danger">
                <div class="box-header with-border">
                    <h3 class="box-title"><i class="fa fa-user"></i> Smart User</h3>

                    <div class="box-tools pull-right">
                        <button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i>
                        </button>
                        <button type="button" class="btn btn-box-tool" data-widget="remove"><i class="fa fa-times"></i></button>
                    </div>
                </div>
                <!-- /.box-header -->

                <div class="box-body">

                    <?php $markdown_data = file_get_contents(__DIR__ . "/user.md"); ?>
                    <?= Markdown::process($markdown_data, 'extra'); ?>

                    <!-- /.box-body -->
                <div class="box-footer">
                    <a href="yii2-user.php" class="btn btn-sm btn-default btn-flat pull-right">More</a>
                </div>
                <!-- /.box-footer-->
            </div>
            <!--/.direct-chat -->
        </div>
    </div>
</section>
