<?php

namespace installation\helpers;

use Yii;

class InstallHelper {

    public function UpdateDBSettings($data) {
        $dbFile = Yii::getAlias('@realAppPath') . '/siteconfig/db.php';

        $dbfile_data = file_get_contents($dbFile);
        if ($dbfile_data) {
            $dbfile_data = str_replace("__DATABASE__", $data["database"], $dbfile_data);
            $dbfile_data = str_replace("__DB_USER__", $data["username"], $dbfile_data);
            $dbfile_data = str_replace("__DB_USER_PASS__", $data["password"], $dbfile_data);
            $dbfile_data = str_replace("__TB_PREFIX__", $data["prefix"], $dbfile_data);
            file_put_contents($dbFile, $dbfile_data);
        }

        return $dbFile;
    }

    public function UpdateAppName($data) {
        $dbFile = Yii::getAlias('@realAppPath') . '/siteconfig/common-config.php';

        $dbfile_data = file_get_contents($dbFile);
        if ($dbfile_data) {
            $dbfile_data = str_replace("__APP_NAME__", $data["appname"], $dbfile_data);
            file_put_contents($dbFile, $dbfile_data);
        } else {
            $dbFile = 'Error !';
        }
        return $dbFile;
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
}
