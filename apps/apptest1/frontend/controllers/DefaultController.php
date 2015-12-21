<?php

namespace apps\apptest1\frontend\controllers;

use yii\web\Controller;
use yii\filters\VerbFilter;
use yii\web\NotFoundHttpException;

/**
 * AppsController implements the CRUD actions for Apps model.
 * @property \apps\testapp1\common\Module $module
 */
class DefaultController extends Controller {

    public function __construct($id, $module) {
        parent::__construct($id, $module);
        // code for check installed application
//        if (!$module->active) {
//            throw new NotFoundHttpException('The requested app is disabled or is not installed.');
//        }
    }

    public function behaviors() {
        return [
            'verbs' => [
                'class' => VerbFilter::className(),
                'actions' => [
                    'delete' => ['post'],
                ],
            ],
            'access' => [
                'class' => \yii\filters\AccessControl::className(),
                'rules' => [
                    [
                        'actions' => ['index', 'view'],
                        'allow' => true,
                    ],
//                    [
//                        'actions' => ['create', 'update', 'index', 'view', 'delete'],
//                        'allow' => true,
//                        'roles' => ['@'],
//                    ],
                ],
            ],
        ];
    }

    /**
     * Lists all Apps models.
     * @return mixed
     */
    public function actionIndex() {

        return $this->render('index');
    }

}
