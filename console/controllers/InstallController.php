<?php
namespace console\controllers;

use yii\console\Controller;
use Yii;

/**
 * Site controller
 */
class InstallController extends Controller {

    public function actionLoad() {

        $db = Yii::$app->getDb();
        $dbName = $this->getDsnAttribute('dbname', $db->dsn);

        echo "Test Load Data from database {$dbName}  ...." . PHP_EOL;
        $dataFile = dirname(dirname(dirname(__FILE__))) . '/migrations/data_imp.sql';

        echo $dataFile . PHP_EOL;

        $queries = $this->SplitSQL($dataFile);
        if ($queries) {
            foreach ($queries as $query) {
                Yii::$app->db->createCommand($query)->execute();
            }
        }
    }

    private function getDsnAttribute($name, $dsn) {
        if (preg_match('/' . $name . '=([^;]*)/', $dsn, $match)) {
            return $match[1];
        } else {
            return null;
        }
    }

    function SplitSQL($file, $delimiter = ';') {
        set_time_limit(0);
        if (is_file($file) === true) {
            $file_str = file_get_contents($file);
            return explode($delimiter, $file_str);
        }
        return false;
    }

}
