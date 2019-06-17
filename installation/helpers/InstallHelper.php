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
            $appfile_data = str_replace("__SMTP_HOST__", $data["smtp_host"], $appfile_data);
            $appfile_data = str_replace("__SMTP_USERNAME__", $data["smtp_user"], $appfile_data);
            $appfile_data = str_replace("__SMTP_PASSWORD__", $data["smtp_password"], $appfile_data);
            $appfile_data = str_replace("__SMTP_PORT__", $data["smtp_port"], $appfile_data);
            $appfile_data = str_replace("__SMTP_ENCRYPTION__", $data["smtp_encryption"], $appfile_data);
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
            $db->close();
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

    public function copyMigrationFiles() {
        $copy_result = '';
        $target = Yii::getalias("@migration");

        $paths = [
            Yii::getalias("@vendor") . '/plathir/yii2-smart-settings/migrations/*',
            Yii::getalias("@vendor") . '/plathir/yii2-smart-apps/migrations/*',
            Yii::getalias("@vendor") . '/plathir/yii2-smart-templates/migrations/*',
            Yii::getalias("@vendor") . '/plathir/yii2-smart-log/migrations/*',
            Yii::getalias("@vendor") . '/plathir/yii2-smart-user/migrations/*',
            Yii::getalias("@vendor") . '/plathir/yii2-smart-widgets/migrations/*',
            Yii::getalias("@vendor") . '/plathir/yii2-smart-blog/migrations/*'];


        foreach ($paths as $path) {

            $fileList = glob($path);
            foreach ($fileList as $file) {
                $cp_result[] = $this->copyFile($file, $target . '/' . basename($file));
            }
        }

        return $cp_result;
    }

    public function copyFile($source, $target) {
        $file = file_get_contents($source);
        if (file_put_contents($target, $file)) {
            return 'file ' . $source . 'copied to ' . $target;
        } else {
            return 'file ' . $source . ' error copied to ' . $target;
        }
    }

    /*
     *  Build Views
     */

    public function BuildViews() {

        $modules = [
            'settings' => ['path' => Yii::getalias("@vendor") . '/plathir/yii2-smart-settings'],
            'apps' => ['path' => Yii::getalias("@vendor") . '/plathir/yii2-smart-apps'],
            'templates' => ['path' => Yii::getalias("@vendor") . '/plathir/yii2-smart-templates'],
            'log' => ['path' => Yii::getalias("@vendor") . '/plathir/yii2-smart-log'],
            'user' => ['path' => Yii::getalias("@vendor") . '/plathir/yii2-smart-user'],
            'widgets' => ['path' => Yii::getalias("@vendor") . '/plathir/yii2-smart-widgets'],
            'blog' => ['path' => Yii::getalias("@vendor") . '/plathir/yii2-smart-blog'],
            'admin' => ['path' => Yii::getalias("@vendor") . '/mdmsoft/yii2-admin'],
            'base' => ['path' => Yii::getalias("@realAppPath")],
        ];

        $results = [];
        foreach ($modules as $moduleName => $module) {
            if ($this->BuildModuleViews($moduleName, $module['path'])) {
                $results[$moduleName] = 'Views Builded !';
            } else {
                $results[$moduleName] = 'Views Cannot Build !';
            }
        }
        return $results;
    }

    public function BuildModuleViews($moduleName, $modulePath) {
        try {
            $this->BuildViewsFiles('backend', 'admin', $moduleName, $modulePath);
            $this->BuildWidgetsViewsFiles('backend', 'admin', $moduleName, $modulePath);

            if (!$moduleName == 'admin') {
                $this->BuildViewsFiles('frontend', 'site', $moduleName, $modulePath);
                $this->BuildWidgetsViewsFiles('frontend', 'site', $moduleName, $modulePath);
            }
            return true;
        } catch (Exception $ex) {
            return false;
        }
    }

    public function BuildViewsFiles($app, $env, $moduleName, $modulePath) {

        if ($moduleName == 'admin') {
            $sourceViewsPath = $modulePath . DIRECTORY_SEPARATOR . 'views';
            $targetViewsPath = Yii::getalias("@themes") . DIRECTORY_SEPARATOR . $env . DIRECTORY_SEPARATOR . 'smart' . DIRECTORY_SEPARATOR . 'module' . DIRECTORY_SEPARATOR . $moduleName;

            if (!file_exists($targetViewsPath)) {
                @mkdir($targetViewsPath);
            }
            $targetViewsPath = $targetViewsPath . DIRECTORY_SEPARATOR . 'views';
        } else {
            $sourceViewsPath = $modulePath . DIRECTORY_SEPARATOR . $app . DIRECTORY_SEPARATOR . 'themes' . DIRECTORY_SEPARATOR . 'smart';
            $targetViewsPath = Yii::getalias("@themes") . DIRECTORY_SEPARATOR . $env . DIRECTORY_SEPARATOR . 'smart' . DIRECTORY_SEPARATOR . 'module' . DIRECTORY_SEPARATOR . $moduleName;
        }

        if (file_exists($sourceViewsPath)) {
            if (!file_exists($targetViewsPath)) {
                @mkdir($targetViewsPath);
            }
            $this->recursive_copy($sourceViewsPath, $targetViewsPath);
        }
    }

    public function BuildWidgetsViewsFiles($app, $env, $moduleName, $modulePath) {

        $sourceViewsPath = $modulePath . DIRECTORY_SEPARATOR . $app . DIRECTORY_SEPARATOR . 'widgets' . DIRECTORY_SEPARATOR . 'themes' . DIRECTORY_SEPARATOR . 'smart';
        $targetViewsPath = Yii::getalias("@themes") . DIRECTORY_SEPARATOR . $env . DIRECTORY_SEPARATOR . 'smart' . DIRECTORY_SEPARATOR . 'module' . DIRECTORY_SEPARATOR . $moduleName . DIRECTORY_SEPARATOR . 'widgets';
        if (file_exists($sourceViewsPath)) {
            if (!file_exists($targetViewsPath)) {
                @mkdir($targetViewsPath);
            }
            $this->recursive_copy($sourceViewsPath, $targetViewsPath);
        }
    }

    public function recursive_copy($src, $dst) {
        $dir = opendir($src);
        @mkdir($dst);
        while (( $file = readdir($dir))) {
            if (( $file != '.' ) && ( $file != '..' )) {
                if (is_dir($src . DIRECTORY_SEPARATOR . $file)) {
                    $this->recursive_copy($src . DIRECTORY_SEPARATOR . $file, $dst . DIRECTORY_SEPARATOR . $file);
                } else {
                    copy($src . DIRECTORY_SEPARATOR . $file, $dst . DIRECTORY_SEPARATOR . $file);
                }
            }
        }
        closedir($dir);
    }

}
