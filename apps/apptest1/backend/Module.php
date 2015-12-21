<?php

namespace apps\apptest1\backend;

use plathir\apps\models\AppsSearch;
use yii\web\NotFoundHttpException;

class Module extends \yii\base\Module {

    public $controllerNamespace = 'apps\apptest1\backend\controllers';

    public function init() {
        parent::init();
        
       if (!$this->checkActive()) {
            throw new NotFoundHttpException('The requested app is disabled or is not installed.');
        }
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
    }

    
    /**
     *  Check application activation
     * @return boolean
     */
     public function checkActive(){

        $searchModel = new AppsSearch();
        if ( $searchModel->find()->where(['name' => 'apptest1', 'active' => true])->one()) {
            return true;
        }
     }
}