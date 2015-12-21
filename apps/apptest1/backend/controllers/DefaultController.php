<?php

namespace apps\apptest1\backend\controllers;

use yii\web\Controller;
use yii\web\NotFoundHttpException;

/**
 * AppsController implements the CRUD actions for Apps model.
 * @property \apps\testapp1\common\Module $module
 */
class DefaultController extends Controller {

    public function __construct($id, $module) {
        parent::__construct($id, $module);
//        if (!$module->active) {
//            throw new NotFoundHttpException('The requested app is disabled or is not installed.');
//        }
        
        // code for check installed application
    }

    /**
     * Lists all Apps models.
     * @return mixed
     */
    public function actionIndex() {
        return $this->render('index');
    }
}
