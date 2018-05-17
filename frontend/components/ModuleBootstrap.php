<?php
namespace frontend\components;

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
        $aModuleList = $oApplication->getModules();

        foreach ($aModuleList as $sKey => $aModule) {
            // custom code for blog url rules
            if (is_array($aModule) && $sKey == 'blog') {
                $sFilePathConfig = Yii::getAlias('@vendor') . DIRECTORY_SEPARATOR . 'plathir' . DIRECTORY_SEPARATOR . 'yii2-smart-blog' . DIRECTORY_SEPARATOR . 'frontend' . DIRECTORY_SEPARATOR . 'config' . DIRECTORY_SEPARATOR . '_url_rules.php';
                if (file_exists($sFilePathConfig)) {
                    $oApplication->getUrlManager()->addRules(require($sFilePathConfig));
                }
            } else {

                if (is_array($aModule) && strpos($aModule['class'], 'apps') === 0) {
                    $sFilePathConfig = dirname(dirname(__DIR__)) . DIRECTORY_SEPARATOR . 'apps' . DIRECTORY_SEPARATOR . $sKey . DIRECTORY_SEPARATOR . 'frontend'. DIRECTORY_SEPARATOR . 'config' . DIRECTORY_SEPARATOR . '_url_rules.php';
                                        
                    if (file_exists($sFilePathConfig)) {
               //         echo $sFilePathConfig .'<br>';
                        $oApplication->getUrlManager()->addRules(require($sFilePathConfig));
                    }
                } else {
                    if (is_array($aModule) && strpos($aModule['class'], 'common\modules') === 0) {
                        $sFilePathConfig = dirname(dirname(__DIR__)) . DIRECTORY_SEPARATOR . 'common' . DIRECTORY_SEPARATOR . 'modules' . DIRECTORY_SEPARATOR . $sKey . DIRECTORY_SEPARATOR . 'config' . DIRECTORY_SEPARATOR . '_url_rules.php';
                        if (file_exists($sFilePathConfig)) {
                            $oApplication->getUrlManager()->addRules(require($sFilePathConfig));
                        }
                    } else {
                        if (is_array($aModule) && strpos($aModule['class'], 'frontend\modules') === 0) {
                            $sFilePathConfig = dirname(dirname(__DIR__)) . DIRECTORY_SEPARATOR . 'frontend' . DIRECTORY_SEPARATOR . 'modules' . DIRECTORY_SEPARATOR . $sKey . DIRECTORY_SEPARATOR . 'config' . DIRECTORY_SEPARATOR . '_url_rules.php';
                            if (file_exists($sFilePathConfig)) {
                                $oApplication->getUrlManager()->addRules(require($sFilePathConfig));
                            }
                        }
                    }
                }
            }
        }
    }

}
