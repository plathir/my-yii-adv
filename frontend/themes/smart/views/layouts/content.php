<?php

use yii\widgets\Breadcrumbs;
use dmstr\widgets\Alert;
use plathir\widgets\common\helpers\PositionHelper;

$positionHelper = new PositionHelper();
?>
<!--<div class="content-wrapper" style="background-color: beige; background-image: url('http://smartbase.dev/media/images/blog/posts/35/58889f1ed4962.jpg')">-->
<div class="content-wrapper">
    <!--<div class="box">-->
    <?php if ($positionHelper->LoadPosition('fe_dashboard_global_header')) { ?>
        <div class="global-header">
            <?php echo $positionHelper->LoadPosition('fe_dashboard_global_header'); ?>
        </div>
    <?php } ?>

    <section class="content-header">
        <?php if (isset($this->blocks['content-header'])) { ?>
            <h1><?= $this->blocks['content-header'] ?></h1>
        <?php } else { ?>
            <h1>
                <?php
                if ($this->title !== null) {
                    echo \yii\helpers\Html::encode($this->title);
                } else {
                    echo \yii\helpers\Inflector::camel2words(
                            \yii\helpers\Inflector::id2camel($this->context->module->id)
                    );
                    echo ($this->context->module->id !== \Yii::$app->id) ? '<small>Module</small>' : '';
                }
                ?>
            </h1>
        <?php } ?>

        <?=
        Breadcrumbs::widget(
                [
                    'links' => isset($this->params['breadcrumbs']) ? $this->params['breadcrumbs'] : [],
                ]
        )
        ?>
    </section>

    <section class="content">
        <div class="row">
            <?php $alert = Alert::widget(); ?>
            <?php if ($alert) { ?>
                <div class="col-lg-12">
                    <div id="alert">
                        <?= $alert; ?>
                    </div>             
                </div>
            <?php }; ?>
            <?= $content ?>
        </div>
    </section>
</div>

<!--</div>-->
<footer class="main-footer">
    <div class="row">
        <div class= "footer-widgets">
            <?= $positionHelper->LoadPosition('fe_dashboard_global_footer') ?> 
        </div>
    </div>

    <div class="row copyright">
        <div class="pull-right hidden-xs">
            <b>Version</b> 2.0
        </div>
        <strong>Copyright &copy; 2017 <a href="http://smartbyii.com">SmartByii.com</a>.</strong> All rights reserved.        
    </div>

</footer>

<!-- Control Sidebar -->
<?php
// Uncomment to activate sidebar
//require('sidebar.php') 
?>
<!-- Add the sidebar's background. This div must be placed
     immediately after the control sidebar -->
<div class='control-sidebar-bg'></div>
