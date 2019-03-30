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

}
