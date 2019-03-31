<?php

namespace installation\helpers;

use Yii;

class InstallHelper {

    public function UpdateDBSettings($data) {
        $dbFile = Yii::getAlias('@realAppPath') . '/siteconfig/db.php';

        $dbfile_data = file_get_contents($dbFile);
        if ($dbfile_data) {
            $dbfile_data = str_replace("__DB_HOST__", $data["dbhost"], $dbfile_data);
            $dbfile_data = str_replace("__DATABASE__", $data["database"], $dbfile_data);
            $dbfile_data = str_replace("__DB_USER__", $data["username"], $dbfile_data);
            $dbfile_data = str_replace("__DB_USER_PASS__", $data["password"], $dbfile_data);
            $dbfile_data = str_replace("__TB_PREFIX__", $data["prefix"], $dbfile_data);
            if (file_put_contents($dbFile, $dbfile_data)) {
                return true;
            } else {
                return false;
            }
        } else {
            return false;
        }
    }

    public function UpdateAppName($data) {
        $appFile = Yii::getAlias('@realAppPath') . '/siteconfig/common-config.php';

        $appfile_data = file_get_contents($appFile);
        if ($appfile_data) {
            $appfile_data = str_replace("__APP_NAME__", $data["appname"], $appfile_data);
            if (file_put_contents($appFile, $appfile_data)) {
                return true;
            } else {
                return false;
            }
        } else {
            $appFile = 'Error !';
        }
    }

    public function MakeKeys() {

        $frontend_file = Yii::getAlias('@realAppPath') . '/siteconfig/frontend.php';
        $backend_file = Yii::getAlias('@realAppPath') . '/siteconfig/backend.php';

        $frontend = file_get_contents($frontend_file);
        $backend = file_get_contents($backend_file);

        $fe_key = md5(uniqid(rand(), true));
        $be_key = md5(uniqid(rand(), true));

        $frontend = str_replace("frontend-key-for-my-yii-adv", $fe_key, $frontend);
        $backend = str_replace("backend-key-for-my-yii-adv", $be_key, $backend);

        if (file_put_contents($frontend_file, $frontend) && file_put_contents($backend_file, $backend)) {
            return true;
        } else {
            return false;
        }
    }

    public function checkInstalled() {
        $dbFile = Yii::getAlias('@realAppPath') . '/siteconfig/db.php';
        $appFile = Yii::getAlias('@realAppPath') . '/siteconfig/common-config.php';
        $frontend_file = Yii::getAlias('@realAppPath') . '/siteconfig/frontend.php';
        $backend_file = Yii::getAlias('@realAppPath') . '/siteconfig/backend.php';

        $dbfile_data = file_get_contents($dbFile);
        $appfile_data = file_get_contents($appFile);
        $frontend = file_get_contents($frontend_file);
        $backend = file_get_contents($backend_file);

        $db_inst = false;
        $app_inst = false;
        $key_frontend_inst = false;
        $key_backend_inst = false;

        
        if ((strpos($dbfile_data, '__DB_HOST__') == false) &&
                (strpos($dbfile_data, '__DATABASE__') == false) &&
                (strpos($dbfile_data, '__DB_USER__') == false) &&
                (strpos($dbfile_data, '__DB_USER_PASS__') == false) &&
                (strpos($dbfile_data, '__TB_PREFIX__') == false)) {

            $db_inst = true;
        };

        if (strpos($appfile_data, '__APP_NAME__') == false) {
            $app_inst = true;
        }

        if (strpos($frontend, 'frontend-key-for-my-yii-adv') == false) {
            $key_frontend_inst = true;
        }

        if (strpos($backend, 'backend-key-for-my-yii-adv') == false) {
            $key_backend_inst = true;
        }

        if ($db_inst == true &&
                $app_inst == true &&
                $key_frontend_inst == true &&
                $key_backend_inst == true) {
            return true;
        } else {
            return false;
        }
    }

    public function CheckDatabaseExist($dbname, $host, $dbuser, $dbpass) {

        $db = new yii\db\Connection([
            'dsn' => 'mysql:host=' . $host . ';dbname=' . $dbname,
            'username' => $dbuser,
            'password' => $dbpass,
            'charset' => 'utf8',
        ]);

        if ($db->open()) {
            $db . close();
            return true;
        } else {
            return false;
        }
    }

    public function MigrateInitialData() {
        $oldApp = \Yii::$app;
        new \yii\console\Application([
            'id' => 'Command runner',
            'basePath' => '@app',
            'components' => [
                'db' => $oldApp->db,
            ],
        ]);
        $result = Yii::$app->runAction('migrate/up', ['migrationPath' => '@migrations', 'interactive' => false]);

        Yii:$app = $oldApp;
        return $result;
    }

}
