<?php

namespace common\modules\snippets\controllers;

use yii\web\Controller;
use common\modules\snippets\models\Snippets;
use Yii;

/**
 * Default controller for the `doc` module
 */
class DefaultController extends Controller {

    
    public function __construct($id, $module) {
        parent::__construct($id, $module);
        $this->layout = "main";
    }
    
    
    public function behaviors() {
        return [
            'access' => [
                'class' => \yii\filters\AccessControl::className(),
                'rules' => [
                    [
                        'actions' => ['index', 'view'],
                        'allow' => true,
                    ],
                    [
                        'actions' => [
                            //'index',
                            
                            'filemanager',
                        ],
                        'allow' => true,
                        'roles' => ['@'],
                    ],
                ],
            ]
        ];
    }    
    /**
     * Renders the index view for the module
     * @return string
     */
    public function actionIndex() {
        $searchModel = new Snippets();
        $snippets = $searchModel->find()->all();

        return $this->render('index', [
                    'snippets' => $snippets,
        ]);
    }

    
        public function actionFilemanager() {

        return $this->render('filemanager');
    }
    
}
