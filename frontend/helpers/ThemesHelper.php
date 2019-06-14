<?php
namespace frontend\helpers;

use Yii;

/**
 * Class ModuleBootstrap
 *
 */
class ThemesHelper {

    public function ModuleThemePath($module, $environment, $currentPath) {


        switch ($environment) {
            case 'frontend':
                if (Yii::$app->settings->getSettings('FrontendTheme') != null) {
                    return realpath(Yii::getAlias('@realAppPath') . '/themes/site/' . Yii::$app->settings->getSettings('FrontendTheme') . "/module/$module");
                } else {
                    return $currentPath;
                }
                break;
            case 'backend':
                if (Yii::$app->settings->getSettings('BackendTheme') != null) {
                    return realpath(Yii::getAlias('@realAppPath') . '/themes/admin/' . Yii::$app->settings->getSettings('BackendTheme') . "/module/$module");
                } else {
                    return $currentPath;
                }
                break;
            default:
                break;
        }
    }

    public function ModuleWidgetsThemePath($module, $currentPath) {

        if (Yii::$app->settings->getSettings('FrontendTheme') != null) {
            return Yii::getAlias('@realAppPath') . '/themes/site/' . Yii::$app->settings->getSettings('FrontendTheme') . "/module/$module/widgets/views";
        } else {
            return $this->ModuleWidgetsRealPath($currentPath);
        }
    }

    public function ModuleRealPath($moduleDir) {
        return dirname($moduleDir) . DIRECTORY_SEPARATOR . 'themes' . DIRECTORY_SEPARATOR . 'smart' . DIRECTORY_SEPARATOR . 'views';
    }

    public function ModuleWidgetsRealPath($moduleDir) {
        return dirname($moduleDir) . 'widgets' . DIRECTORY_SEPARATOR . 'themes' . DIRECTORY_SEPARATOR . 'smart' . DIRECTORY_SEPARATOR . 'views';
    }

    public function AppThemePath($app, $currentPath) {

        if (Yii::$app->settings->getSettings('BackendTheme') != null) {
            return Yii::getAlias('@realAppPath') . '/themes/admin/' . Yii::$app->settings->getSettings('BackendTheme') . "/apps/$app/views";
        } else {
            return $this->ModuleRealPath($currentPath);
        }
    }

    public function AppWidgetsThemePath($app, $currentPath) {

        if (Yii::$app->settings->getSettings('BackendTheme') != null) {
            return Yii::getAlias('@realAppPath') . '/themes/admin/' . Yii::$app->settings->getSettings('BackendTheme') . "/apps/$app/widgets/views";
        } else {
            return $this->ModuleWidgetsRealPath($currentPath);
        }
    }

    public function AppRealPath($appDir) {
        return dirname($appDir) . DIRECTORY_SEPARATOR . 'themes' . DIRECTORY_SEPARATOR . 'smart' . DIRECTORY_SEPARATOR . 'views';
    }

    public function AppWidgetsRealPath($appDir) {
        return dirname($appDir) . 'widgets' . DIRECTORY_SEPARATOR . 'themes' . DIRECTORY_SEPARATOR . 'smart' . DIRECTORY_SEPARATOR . 'views';
    }

}
