<?php
namespace frontend\components;

use Yii;
use yii\base\BootstrapInterface;
use yii\base\Theme;

class ThemeBootstrap implements BootstrapInterface {

    public function bootstrap($app) {
        if (Yii::$app->settings->getSettings('FrontendTheme') != null) {
            $theme = Yii::$app->settings->getSettings('FrontendTheme');

            Yii::$app->view->theme = new Theme([
                'basePath' => "@realAppPath/themes/site/$theme/module/base/views",
                'baseUrl' => "@web/themes/site/$theme",
                'pathMap' => [
//                    '@app/views' => "@app/themes/$theme/views",
                    '@app/views' => "@realAppPath/themes/site/$theme/module/base/views", // path for new views Path
                ],
            ]);
        } 
    }
}
