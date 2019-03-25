<?php

namespace installation\controllers;

use yii\web\Controller;
use installation\models\Install;
use Yii;

/**
 * Site controller
 */
class SiteController extends Controller {

    public function actionIndex() {
        $model = new Install();
        return $this->render('index', [
                    'model' => $model,
        ]);
    }

    public function actionInstall() {
        $model = '';

        return $this->render('install', [
                    'model' => $model,
        ]);
    }

    public function actionAjaxDbInstall() {
echo 'In';
        if (Yii::$app->request->isAjax) {
         //   echo 'In';
         //   die();
            \Yii::$app->response->format = \yii\web\Response::FORMAT_JSON;

            return [
                'data' => [
                    'success' => true,
                    'model' => $model,
                    'message' => 'Model has been saved.',
                ],
                'code' => 0,
            ];
        }
    }
    
}
    