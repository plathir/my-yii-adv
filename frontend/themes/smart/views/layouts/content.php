<?php

use yii\widgets\Breadcrumbs;
use dmstr\widgets\Alert;
use plathir\widgets\common\helpers\PositionHelper;

$positionHelper = new PositionHelper();
?>
<div class="content-wrapper">
    <!--<div class="box">-->
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
            <?php echo $positionHelper->LoadPosition('fe_dashboard_global_header'); ?>
        </div>

        <div class="row">
            <?= Alert::widget() ?>
            <?= $content ?>
        </div>

    </section>
</div>

<!--</div>-->
<footer class="main-footer">
    <p>
        This is a Frontend Footer            
    </p>
    <div class="pull-right hidden-xs">
        <b>Version</b> 2.0


    </div>
    <strong>Copyright &copy; 2014-2015 <a href="http://almsaeedstudio.com">Almsaeed Studio</a>.</strong> All rights
    reserved.
</footer>

<!-- Control Sidebar -->
<?php
// Uncomment to activate sidebar
//require('sidebar.php') 
?>
<!-- Add the sidebar's background. This div must be placed
     immediately after the control sidebar -->
<div class='control-sidebar-bg'></div>
