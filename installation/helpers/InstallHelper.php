<?php
namespace installation\helpers;

use Yii;

class InstallHelper {

    public function UpdateDBSettings($data) {
        $dbFile = dirname(Yii::getAlias('@installation')) .'/siteconfig/db.php';
        
        $dbfile_data = file_get_contents($dbfils);
        $dbfile_data = str_replace("__DATABASE__", $data["database"], $dbfile_data);
        file_put_contents($dbFile, $dbfile_data);
        
        return $dbFile;
    }

}
