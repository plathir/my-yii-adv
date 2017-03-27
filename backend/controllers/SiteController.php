<?php

namespace backend\controllers;

use Yii;
use yii\filters\AccessControl;
use yii\web\Controller;
use plathir\user\common\models\security\LoginForm;
use yii\filters\VerbFilter;

/**
 * Site controller
 */
class SiteController extends Controller {

    /**
     * @inheritdoc
     */
    public function behaviors() {
        return [
            'access' => [
                'class' => AccessControl::className(),
                'rules' => [
                    [
                        'actions' => ['login', 'error', 'site-settings'],
                        'allow' => true,
                    ],
                    [
                        'actions' => ['logout', 'index', 'site-settings'],
                        'allow' => true,
                        'roles' => ['@'],
                    ],
                ],
            ],
            'verbs' => [
                'class' => VerbFilter::className(),
                'actions' => [
                    'logout' => ['post'],
                ],
            ],
        ];
    }

    /**
     * @inheritdoc
     */
    public function actions() {
        return [
            'error' => [
                'class' => 'yii\web\ErrorAction',
            ],
        ];
    }

    public function actionIndex() {
        if (\yii::$app->user->can('BackendIndex')) {
            $appsHelper = new \plathir\apps\helpers\AppsHelper();
            $apps = $appsHelper->getAppsList();
            return $this->render('index', ['apps' => $apps
            ]);
        } else {
            throw new \yii\web\NotAcceptableHttpException(Yii::t('app', 'No Permission to Backend index'));
        }
    }

    public function actionLogin() {

        if (!\Yii::$app->user->isGuest) {
            return $this->goHome();
        }

        $model = new LoginForm();


        if ($model->load(Yii::$app->request->post()) && $model->login()) {
            return $this->goBack();
        } else {
            echo 'test in site Controller   ';
            print_r($model);
            die();
            return $this->render('backend-login', [
                        'model' => $model,
            ]);
        }
    }

    public function actionLogout() {
        Yii::$app->user->logout();

        return $this->goHome();
    }

}
