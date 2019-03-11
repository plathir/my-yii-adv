<?php
namespace backend\components;

use yii\base\BootstrapInterface;
use Yii;

/**
 * Class ModuleBootstrap
 *
 */
class ModuleBootstrap implements BootstrapInterface {

    /**
     * @param \yii\base\Application $oApplication
     */
    public function bootstrap($oApplication) {

        $apps = \plathir\apps\backend\models\Apps::find()->where(['active' => 1])->all();
        $applic["Posts"] = [
            'class' => \plathir\smartblog\backend\models\PostsGlobalSearch::class,
            'label' => 'Posts',
        ];
        foreach ($apps as $app) {
            $class = 'apps' . '\\' . $app->name . '\\' . 'backend\models\RecipesGlobalSearch';
            if (class_exists($class)) {
                $applic[$app->name] = [
                    'class' => $class,
                    'label' => $app->name,
                ];
            }
        };
        Yii::$app->searcher->models = array_merge($applic);
    }

}
