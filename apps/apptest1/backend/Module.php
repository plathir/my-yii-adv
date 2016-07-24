<?php

namespace apps\apptest1\backend;

use Yii;
use apps\apptest1\backend\apptest1Asset;

class Module extends \yii\base\Module {

    public $controllerNamespace = 'apps\apptest1\backend\controllers';

    public function init() {
        parent::init();
        $this->setModules([
            'settings' => [
                'class' => 'plathir\settings\Module',
                'modulename' => 'apptest1'
            ],
        ]);

        $this->setComponents([
            'settings' => [
                'class' => 'plathir\settings\components\Settings',
                'modulename' => 'apptest1'
            ],
        ]);
        // custom initialization code goes here
        $this->registerAssets();
    }

    public function registerAssets() {
        $view = Yii::$app->getView();
        apptest1Asset::register($view);
    }

}
