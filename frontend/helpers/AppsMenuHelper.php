<?php

namespace frontend\helpers;

use yii\helpers\Html;
use yii\bootstrap\Nav;
use yii\helpers\Url;
use yii\bootstrap\Dropdown;

/* @var $this \yii\web\View */
/* @var $content string */

class AppsMenuHelper {

    public function getFrontendMenu($view) {

        $appsHelper = new \plathir\apps\helpers\AppsHelper();
        $applications = $appsHelper->getAppsList();
        $i = 0;
        $dropdown = null;
        $appItems = null;
        foreach ($applications as $application) {
            $i++;
            $bundle = null;
            $assetClassName = 'apps' . '\\' . $application->name . '\\frontend\\' . $application->name . 'Asset';
            $assetClass = new $assetClassName();
            $bundle = $assetClass->register($view);

            $img = $bundle->baseUrl . $application->app_icon;
            $AppsDispl = \Yii::$app->settings->getSettings('NumOfAppsFeNavBar');
            if ($i > $AppsDispl) {
                $dropdown[] = $application;
            } else {
                $appItems[] = ['label' => Html::img($img, ['alt' => '...', 'class' => 'app-image']) . $application->name, 'url' => Url::toRoute('/' . $application->name)];
            }
        }

        if ($dropdown != null) {
            foreach ($dropdown as $app) {
                $assetClassName = 'apps' . '\\' . $app->name . '\\frontend\\' . $app->name . 'Asset';
                $assetClass = new $assetClassName();
                $assetClass->register($view);
                $img = $bundle->baseUrl . $app->app_icon;

                $ddappItems[] = ['label' => Html::img($img, ['alt' => '...', 'class' => 'app-image']) . $app->name, 'url' => Url::toRoute('/' . $app->name)];
            }
            $appItems[] = ['label' => 'More', 'url' => '#',
                'items' => $ddappItems];
        }

        return $appItems;
    }

}
