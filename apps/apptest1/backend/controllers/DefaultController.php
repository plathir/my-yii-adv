<?php

namespace apps\apptest1\backend\controllers;

use yii\web\Controller;

/**
 * AppsController implements the CRUD actions for Apps model.
 * @property \apps\testapp1\backend\Module $module
 */
class DefaultController extends Controller {

    public function __construct($id, $module) {
        parent::__construct($id, $module);
        // code for check installed application
    }

//    public function behaviors() {
//        return [
//            'verbs' => [
//                'class' => VerbFilter::className(),
//                'actions' => [
//           //         'delete' => ['post'],
//           //         'uninstall' => ['post'],
//                ],
//            ],
//        ];
//    }

    /**
     * Lists all Apps models.
     * @return mixed
     */
    public function actionIndex() {

        return $this->render('index');
    }

}
