<?php

namespace common\modules\doc\controllers;

use yii\web\Controller;

/**
 * Default controller for the `doc` module
 */
class DefaultController extends Controller {

    /**
     * Renders the index view for the module
     * @return string
     */
    public function actionIndex() {
        return $this->render('index');
    }

    public function actionUser() {
        return $this->render('user');
    }

}
