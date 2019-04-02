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

        if ($model->load(Yii::$app->request->post())) {

            $helper = new \installation\helpers\InstallHelper();
            //    if (!$helper->checkInstalled()) {

            $copy_files = $helper->copyMigrationFiles();
            $db_results = $helper->UpdateDBSettings($model);
            $app_results = $helper->UpdateAppName($model);
            $keys_results = $helper->MakeKeys();
            $migr_results = $this->MigrateInitialData();

            $result["copy_files"] = $copy_files;
            $result["db_results"] = $db_results;
            $result["app_results"] = $app_results;
            $result["keys_results"] = $keys_results;
            $result["migr_results"] = $migr_results;

            return $this->render('result', [
                        'result' => $result,
            ]);
        } else {
            if (!isset($model->dbhost)) {
                $model->dbhost = 'localhost';
            };

            return $this->render('index', [
                        'model' => $model,
            ]);
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
