<?php

namespace app\components;

use Yii;
use yii\base\BootstrapInterface;

class Bootstrap implements BootstrapInterface {

    public function bootstrap($app) {
        $clients = [];
        /**
         *  enable Facebook login if settings have values
         */
        if (Yii::$app->settings->getSettings('FacebookClientID') != null &&
                Yii::$app->settings->getSettings('FacebookClientSecret') != null) {
            $facebook = [
                'class' => 'yii\authclient\clients\Facebook',
                'clientId' => Yii::$app->settings->getSettings('FacebookClientID'),
                //   '_name' => 'Facebook Name',
                'clientSecret' => Yii::$app->settings->getSettings('FacebookClientSecret'),
            ];

            $clients['facebook'] = $facebook;
        }

// Write some code for other clients
//...


        $app->set('authClientCollection', [
            'class' => 'yii\authclient\Collection',
            'clients' => $clients,
                ]
        );
    }

}
