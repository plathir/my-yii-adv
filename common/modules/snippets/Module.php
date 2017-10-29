<?php

namespace common\modules\snippets;

use Yii;
/**
 * doc module definition class
 */
class Module extends \yii\base\Module
{
    /**
     * @inheritdoc
     */
    public $controllerNamespace = 'common\modules\snippets\controllers';
    public $Theme = 'smart';
    public $mediaPath = '';
    public $mediaUrl = '';
    
    /**
     * @inheritdoc
     */
    public function init()
    {
        parent::init();
        $path = Yii::getAlias('@common') . '/modules/snippets/themes/' . $this->Theme . '/views';

        $this->setViewPath($path);
        $this->mediaPath = $this->settings->getSettings('SnippetsMediaPath');
        $this->mediaUrl = $this->settings->getSettings('SnippetsMediaUrl');
        
        $this->controllerMap = [
            'elfinder' => [
                'class' => 'mihaildev\elfinder\Controller',
                'access' => ['@'],
                'disabledCommands' => ['netmount'],
                'roots' => [
                    [
                        'baseUrl' => $this->mediaUrl,
                        'basePath' => $this->mediaPath,
                        'path' => '',
                        'name' => 'Global'
                    ],
                ],
            ],
        ];
        // custom initialization code goes here
    }
}
