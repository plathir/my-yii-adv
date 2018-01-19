<?php

namespace backend\assets;

use yii\web\AssetBundle;

class AdminLtePluginAsset extends AssetBundle {

    public $sourcePath = '@vendor/almasaeed2010/adminlte/plugins';
    public $js = [
        'iCheck/icheck.min.js',
        'jvectormap/jquery-jvectormap-1.2.2.min.js',
        'jvectormap/jquery-jvectormap-world-mill-en.js',
            // more plugin Js here
    ];
    public $css = [
        'iCheck/square/blue.css',
        'jvectormap/jquery-jvectormap-1.2.2.css',
            // more plugin CSS here
    ];
    public $depends = [
        'dmstr\web\AdminLteAsset',
    ];

}
