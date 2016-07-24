<?php

namespace apps\recipes\backend;

class Module extends \yii\base\Module
{
    public $controllerNamespace = 'apps\recipes\controllers';

    public function init()
    {
        parent::init();
        $this->setModules([
            'settings' => [
                'class' => 'plathir\settings\Module',
                 'modulename' => 'recipes'
            ],
        ]);

        $this->setComponents([    
            'settings' => [
                'class' => 'plathir\settings\components\Settings',
                'modulename' => 'recipes'
            ],
        ]);
        // custom initialization code goes here
    }
}
