<?php

namespace apps\recipes\backend;

use yii\web\AssetBundle;

class RecipesAsset extends AssetBundle {

    public $js = [
    //    'js/main.js'
    ];
    public $depends = [
        'yii\web\YiiAsset',
        'yii\bootstrap\BootstrapAsset',
    ];

    public function init() {
        $this->setSourcePath('@apps/recipes/assets');
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
