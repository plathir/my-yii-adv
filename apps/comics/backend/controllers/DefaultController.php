<?php

namespace apps\comics\backend\controllers;

use Yii;
use apps\comics\backend\models\Comics;
use apps\comics\backend\models\ComicsSearch;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;

/**
 * DefaultController implements the CRUD actions for Comics model.
 */
class DefaultController extends Controller {

    /**
     * @inheritdoc
     */
    public function behaviors() {
        return [
            'verbs' => [
                'class' => VerbFilter::className(),
                'actions' => [
                    'delete' => ['POST'],
                ],
            ],
        ];
    }

    public function actions() {
        $actions = [
            'error' => [
                'class' => 'yii\web\ErrorAction',
            ],
            //Upload cropped image into temp directory
            'uploadphoto' => [
                'class' => '\plathir\cropper\actions\UploadAction',
                'width' => 600,
                'height' => 600,
                'temp_path' => $this->module->ComicsTempPath,
            ],
            'uploadfile' => [
                'class' => '\plathir\upload\actions\FileUploadAction',
                'uploadDir' => $this->module->ComicsTempPath,
            ],
            'deletetempfile' => [
                'class' => '\plathir\upload\actions\FileDeleteAction',
                'uploadDir' => $this->module->ComicsTempPath,
            ],
        ];

        return $actions;
    }

    /**
     * Lists all Comics models.
     * @return mixed
     */
    public function actionIndex() {
        $searchModel = new ComicsSearch();
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);

        return $this->render('index', [
                    'searchModel' => $searchModel,
                    'dataProvider' => $dataProvider,
        ]);
    }

    /**
     * Displays a single Comics model.
     * @param integer $id
     * @return mixed
     */
    public function actionView($id) {
        return $this->render('view', [
                    'model' => $this->findModel($id),
        ]);
    }

    /**
     * Creates a new Comics model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    public function actionCreate() {
        $model = new Comics();

        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            if (isset($model->comic_pages)) {
                if ($model->comic_pages) {
                    $temp_array = json_decode($model->comic_pages);
                    sort($temp_array);
                    $model->comic_pages = json_encode($temp_array);
                    $model->update();
                }
            }
            return $this->redirect(['view', 'id' => $model->id]);
        } else {
            return $this->render('create', [
                        'model' => $model,
            ]);
        }
    }

    /**
     * Updates an existing Comics model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param integer $id
     * @return mixed
     */
    public function actionUpdate($id) {
        $model = $this->findModel($id);

        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            if (isset($model->comic_pages)) {
                if ($model->comic_pages) {
                    $temp_array = json_decode($model->comic_pages);
                    sort($temp_array);
                    $model->comic_pages = json_encode($temp_array);
                    $model->update();
                }
            }
            return $this->redirect(['view', 'id' => $model->id]);
        } else {
            return $this->render('update', [
                        'model' => $model,
            ]);
        }
    }

    /**
     * Deletes an existing Comics model.
     * If deletion is successful, the browser will be redirected to the 'index' page.
     * @param integer $id
     * @return mixed
     */
    public function actionDelete($id) {
        $this->findModel($id)->delete();

        return $this->redirect(['index']);
    }

    public function actionFilemanager() {

        return $this->render('filemanager');
    }

    /**
     * Finds the Comics model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param integer $id
     * @return Comics the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id) {
        if (($model = Comics::findOne($id)) !== null) {
            return $model;
        } else {
            throw new NotFoundHttpException('The requested page does not exist.');
        }
    }

}
