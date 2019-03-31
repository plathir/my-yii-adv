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
                    'migrate'
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

    public function actionMigrate() {
        $result = $this->MigrateInitialData();
        return $this->render('migrate', [
                    'result' => $result,
        ]);
    }

    public function actionAjaxInstall() {
        if (Yii::$app->request->isAjax) {
//            \Yii::$app->response->format = \yii\web\Response::FORMAT_JSON;
            $data = Yii::$app->request->post("Install");
            $helper = new \installation\helpers\InstallHelper();

            //    if (!$helper->checkInstalled()) {

            $db_results = $helper->UpdateDBSettings($data);
            $app_results = $helper->UpdateAppName($data);
            $keys_results = $helper->MakeKeys();
            $migr_results = $helper->MigrateInitialData();
     
     //       \Yii::$app->response->format = \yii\web\Response::FORMAT_JSON;
     
            return [
                'data' => [
                    'success' => true,
                    'message' => 'Model has been saved.',
//                        'data' => $db_results . '<br>' . $app_results . '<br>' . $keys_results . '<br>'. $migr_results . '<br>',
                  //  'data' => $migr_results,
                    'data' => 'test',
                    'ajax' => Yii::$app->request->isAjax,
                ],
                'code' => 0,
            ];
//            } else {
//                return [
//                    'data' => [
//                        'success' => true,
//                        'message' => 'Application Allready Installed !',
//                        'data' => '',
//                        'ajax' => Yii::$app->request->isAjax,
//                    ],
//                    'code' => 0,
//                ];
//            }
        }
    }

    public function MigrateInitialData() {

        ob_start();

        defined('STDIN') or define('STDIN', fopen('php://stdin', 'r'));
        defined('STDOUT') or define('STDOUT', fopen('php://stdout', 'w'));
        defined('STDERR') or define('STDERR', fopen('php://stderr', 'w'));

        $config = require( Yii::getAlias('@console') . '/config/main.php');

        $runner = new \yii\console\Application($config);
        $migration = new \yii\console\controllers\MigrateController('migrate', $runner);
        $status = $migration->runAction('up', ['migrationPath' => '@migration', 'interactive' => false]);      
        $runner->runAction('install/load', ['interactive' => false]);
        fclose(\STDOUT);
        fclose(\STDERR);

        return ob_get_clean();
    }

}
