<?php
namespace installation\controllers;

use yii\web\Controller;
use installation\models\Install;
use installation\models\Import;
use Yii;
use yii\filters\VerbFilter;

/**
 * Site controller
 */
class SiteController extends Controller {

    public function behaviors() {
        return [
            'verbs' => [
                'class' => VerbFilter::className(),
                'actions' => [
                    'ajax-db-install' => ['post'],
                ],
            ],
        ];
    }

    public function actionIndex() {
        $model = new Install();
        $modelImport = new Import();
        return $this->render('index', [
                    'model' => $model,
                    'modelImport' => $modelImport,
        ]);
    }

    public function actionInstall() {
        $model = '';

        return $this->render('install', [
                    'model' => $model,
        ]);
    }

    public function actionAjaxInstall() {
        if (Yii::$app->request->isAjax) {
            \Yii::$app->response->format = \yii\web\Response::FORMAT_JSON;

            return [
                'data' => [
                    'success' => true,
                    'message' => 'Model has been saved.',
                    'ajax' => Yii::$app->request->isAjax,
                ],
                'code' => 0,
            ];
        }
    }

}
