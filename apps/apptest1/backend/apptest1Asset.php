<?php

namespace apps\apptest1\backend;

use yii\web\AssetBundle;

class apptest1Asset extends AssetBundle {

    public $js = [
    //    'js/main.js'
    ];
    public $depends = [
        'yii\web\YiiAsset',
        'yii\bootstrap\BootstrapAsset',
    ];

    public function init() {
        $this->setSourcePath('@apps/apptest1/assets');
        parent::init();
    }

    protected function setSourcePath($path) {
        if (empty($this->sourcePath)) {
            $this->sourcePath = $path;
        } else {
            $this->sourcePath = '';
        }
    }

}
