<?php

namespace common\helpers;

use Yii;
use \plathir\apps\helpers\AppsHelper;

/**
 * Class ModuleBootstrap
 *
 */
class ThemesHelper {

    public function ModuleThemePath($module, $environment, $currentPath) {

        switch ($environment) {
            case 'frontend':
                if (Yii::$app->settings->getSettings('FrontendTheme') != null) {
                    $frontendTheme = Yii::$app->settings->getSettings('FrontendTheme');
                    $frontendPrefix = $this->pathPrefix($environment);
                    return realpath($frontendPrefix . DIRECTORY_SEPARATOR . $frontendTheme . DIRECTORY_SEPARATOR . $this->findkModuleOrAppName($module) . DIRECTORY_SEPARATOR . $module);
                } else {
                    return $currentPath;
                }
                break;
            case 'backend':
                if (Yii::$app->settings->getSettings('BackendTheme') != null) {
                    $backendTheme = Yii::$app->settings->getSettings('BackendTheme');
                    $backendPrefix = $this->pathPrefix($environment);                    
                    return realpath($backendPrefix . DIRECTORY_SEPARATOR . $backendTheme . DIRECTORY_SEPARATOR . $this->findkModuleOrAppName($module) . DIRECTORY_SEPARATOR . $module);
                } else {
                    return $currentPath;
                }
                break;
            default:
                break;
        }
    }

    private function pathPrefix($env) {
        $prefix = '';

        switch ($env) {
            case 'frontend':
                $prefix = Yii::getAlias('@realAppPath') . DIRECTORY_SEPARATOR . 'themes' . DIRECTORY_SEPARATOR . 'site';
                break;
            case 'backend':
                $prefix = Yii::getAlias('@realAppPath') . DIRECTORY_SEPARATOR . 'themes' . DIRECTORY_SEPARATOR . 'admin';
                break;
            default:
                break;
        }

        return $prefix;
    }

    private function findkModuleOrAppName($modulename) {

        $appshelper = new AppsHelper();
        $appsList = $appshelper->getAppsList(false);
        $name = '';

        if ($appsList) {
            foreach ($appsList as $app) {
                if ($app->name == $modulename) {
                    $name = 'apps';
                }
            }
        } else {
            $name = 'module';
        }
        if (!$name) {
            $name = 'module';
        }
        return $name;
    }

}
