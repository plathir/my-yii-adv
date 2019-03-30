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
            if (!$this->checkInstalled()) {
                $data = Yii::$app->request->post("Install");
                $helper = new \installation\helpers\InstallHelper();

                $db_results = $helper->UpdateDBSettings($data);
                $app_results = $helper->UpdateAppName($data);
                $keys_results = $helper->MakeKeys();

                return [
                    'data' => [
                        'success' => true,
                        'message' => 'Model has been saved.',
                        'data' => $db_results . '<br>' . $app_results . '<br>' . $keys_results . '<br>',
                        'ajax' => Yii::$app->request->isAjax,
                    ],
                    'code' => 0,
                ];
            } else {
                return [
                    'data' => [
                        'success' => true,
                        'message' => 'Application Allready Installed !',
                        'data' => '',
                        'ajax' => Yii::$app->request->isAjax,
                    ],
                    'code' => 0,
                ];
            }
        }
    }

    public function checkInstalled() {

        return true;
    }

}
