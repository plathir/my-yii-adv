<?php
namespace frontend\assets;

use yii\web\AssetBundle;
class AdminLtePluginAsset extends AssetBundle
{
    public $sourcePath = '@vendor/almasaeed2010/adminlte/plugins';
    public $js = [
        'iCheck/icheck.min.js'
        // more plugin Js here
    ];
    public $css = [
        'iCheck/square/blue.css',
        // more plugin CSS here
    ];
    public $depends = [
        'dmstr\web\AdminLteAsset',
    ];
}