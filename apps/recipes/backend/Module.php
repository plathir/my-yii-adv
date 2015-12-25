<?php

namespace apps\recipes\backend;

use Yii;
use apps\recipes\backend\recipesAsset;
use plathir\apps\models\AppsSearch;
use yii\web\NotFoundHttpException;

class Module extends \yii\base\Module {

    public $controllerNamespace = 'apps\recipes\backend\controllers';

    public function init() {
        parent::init();



        if (!$this->checkActive()) {
            throw new NotFoundHttpException('The requested app is disabled or is not installed.');
        }

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
        $this->registerAssets();
    }

    public function registerAssets() {
        $view = Yii::$app->getView();
        recipesAsset::register($view);
    }

    /**
     *  Check application activation
     * @return boolean
     */
    public function checkActive() {
        $searchModel = new AppsSearch();
        if ($searchModel->find()->where(['name' => 'recipes', 'active' => true])->one()) {
            return true;
        }
    }

}
