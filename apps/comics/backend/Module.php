<?php

namespace apps\comics\backend;

use Yii;
use apps\comics\backend\comicsAsset;
use plathir\apps\models\AppsSearch;
use yii\web\NotFoundHttpException;

class Module extends \yii\base\Module {

    public $controllerNamespace = 'apps\comics\backend\controllers';
    public $ComicsUrl = '';
    public $ComicsPath = '';
    public $ComicsTempPath = '';
    public $ComicsPathPreview = '';
    public $ComicsTempPathPreview = '';

    public function init() {
        parent::init();

        if (!$this->checkActive()) {
            throw new NotFoundHttpException('The requested app is disabled or is not installed.');
        }

        $this->setModules([
            'settings' => [
                'class' => 'plathir\settings\Module',
                'modulename' => 'comics'
            ],
        ]);

        $this->setComponents([
            'settings' => [
                'class' => 'plathir\settings\components\Settings',
                'modulename' => 'comics'
            ],
        ]);

        // Get Values from Settings 
        $this->ComicsUrl = $this->settings->getSettings('ComicsUrl');
        $this->ComicsPath = $this->settings->getSettings('ComicsPath');
        $this->ComicsTempPath = $this->settings->getSettings('ComicsTempPath');
        $this->ComicsPathPreview = $this->settings->getSettings('ComicsPathPreview');
        $this->ComicsTempPathPreview = $this->settings->getSettings('ComicsTempPathPreview');


        $this->controllerMap = [
            'elfinder' => [
                'class' => 'mihaildev\elfinder\Controller',
                'access' => ['@'],
                'disabledCommands' => ['netmount'],
                'roots' => [
                    [
                        'baseUrl' => $this->ComicsUrl,
                        'basePath' => $this->ComicsPath,
                        'path' => '',
                        'name' => 'Comics'
                    ],
                ],
            ],
        ];

        // custom initialization code goes here
        $this->registerAssets();
    }

    public function registerAssets() {
        $view = Yii::$app->getView();
        comicsAsset::register($view);
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
