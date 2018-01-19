<?php

use yii\helpers\Html;
?>


<?php
if (\Yii::$app->view->theme) {
    $layoutFile = \Yii::$app->view->theme->pathMap['@app/views'] . DIRECTORY_SEPARATOR . 'layouts/main.php';
} else {
    $layoutFile = '@app/views/layouts/main.php';
}
?>

<?php $this->beginContent($layoutFile); ?>
<?php
//backend\assets\AdminLtePluginAsset::register($this);
//backend\assets\AdminLteBowerAsset::register($this);
?>     

<div class="box box-danger">
    <div class="box-header with-border">
        <h3 class="box-title"><?= Yii::t('app', 'Snippets') ?></h3>
        <div class="box-tools pull-right">
            <button class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i></button>
            <button class="btn btn-box-tool" data-widget="remove"><i class="fa fa-times"></i></button>
        </div>
    </div><!-- /.box-header -->
    <div class="box-body">
        <?php
        $htmlFileManager = Html::a(Yii::t('app', '<i class="fa fa-folder-open"></i>File Manager'), ['/snippets/default/filemanager'], ['class' => 'btn btn-app']);
        $htmlSnippetsManage = Html::a(Yii::t('app', '<i class="fa fa-users"></i>' . Yii::t('app', 'Manage Snippets')), ['/snippets/snippets'], ['class' => 'btn btn-app']);
        ?>

        <?= Html::tag('span', $htmlFileManager, ['title' => Yii::t('app', 'Open File Manager'), 'data-toggle' => 'tooltip']) ?>
        <?= Html::tag('span', $htmlSnippetsManage, ['title' => Yii::t('app', 'Open Snippets Manager'), 'data-toggle' => 'tooltip']) ?>
    </div>
</div>
<?php ?>

<?= $content ?>

<?php $this->endContent(); ?>


