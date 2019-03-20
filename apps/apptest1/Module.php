<?php

namespace apps\apptest1\backend;

class Module extends \yii\base\Module {

    public $controllerNamespace = 'apps\apptest1\controllers';

    public function init() {
        parent::init();
        $this->setModules([
            'settings' => [
                'class' => 'plathir\settings\backend\Module',
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
    }

}
