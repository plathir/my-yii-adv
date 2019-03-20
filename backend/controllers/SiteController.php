<?php

namespace backend\controllers;

use Yii;
use yii\filters\AccessControl;
use yii\web\Controller;
use plathir\user\common\models\security\LoginForm;
use yii\filters\VerbFilter;
use yii\helpers\Url;

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
                        'actions' => ['logout', 'index', 'site-settings', 'search', 'system', 'cache', 'changelang', 'deletefrontendcache', 'deletebackendcache'],
                        'allow' => true,
                        'roles' => ['@'],
                    ],
                ],
            ],
            'verbs' => [
                'class' => VerbFilter::className(),
                'actions' => [
                    'logout' => ['post'],
                    'deletefrontendcache' => ['post'],
                    'deletebackendcache' => ['post'],
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

    public function actionSystem() {
        // if (\yii::$app->user->can('BackendIndex')) {

        return $this->render('system');
//        } else {
//            throw new \yii\web\NotAcceptableHttpException(Yii::t('app', 'No Permission to Backend index'));
//        }
    }

    public function actionCache() {

        return $this->render('cache');
    }

    public function actionDeletebackendcache() {
        
       //Yii::$app->backendCache->flush();
        Yii::$app->cache->flush(); 
        $this->redirect(['cache']);
    }

    public function actionDeletefrontendcache() {

        Yii::$app->frontendCache->flush();
        $this->redirect(['cache']);
    }

    public function actionSearch($q) {
        if ($q) {
//            echo '<pre>';
//            print_r(Yii::$app->get('searcher'));
//            echo '</pre>';
//            die();
            $results = Yii::$app->get('searcher')->search($q);
            return $this->render('search_results', ['results' => $results]);
        } else {
            return $this->goBack();
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
//            echo 'test in site Controller   ';
//            print_r($model);
//            die();
            return $this->render('backend-login', [
                        'model' => $model,
            ]);
        }
    }

    public function actionLogout() {
        Yii::$app->user->logout();

        return $this->goHome();
    }

    public function actionChangelang($language) {
        Yii::$app->session->set('lang', $language);
        return $this->redirect(Yii::$app->request->referrer ?: Yii::$app->homeUrl);
    }

    public function actionSessions() {
        
        
        
    }
    
}
