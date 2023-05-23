<?php

namespace backend\controllers;

use common\models\Audio;
use common\models\AudioSearch;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;

/**
 * AudioController implements the CRUD actions for Audio model.
 */
class AudioController extends Controller
{
    /**
     * @inheritDoc
     */
    public function behaviors()
    {
        return array_merge(
            parent::behaviors(),
            [
                'verbs' => [
                    'class' => VerbFilter::className(),
                    'actions' => [
                        'delete' => ['POST'],
                    ],
                ],
            ]
        );
    }

    /**
     * Lists all Audio models.
     *
     * @return string
     */
    public function actionIndex()
    {
        $this->layout = 'admin';
        $searchModel = new AudioSearch();
        $dataProvider = $searchModel->search($this->request->queryParams);

        return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }

    /**
     * Displays a single Audio model.
     * @param int $audio_id Audio ID
     * @return string
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionView($audio_id)
    {
        $this->layout = 'admin';
        return $this->render('view', [
            'model' => $this->findModel($audio_id),
        ]);
    }

    /**
     * Creates a new Audio model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return string|\yii\web\Response
     */
    public function actionCreate()
    {
        $this->layout = 'admin';
        $model = new Audio();

        if ($this->request->isPost) {
            if ($model->load($this->request->post()) && $model->save()) {
                return $this->redirect(['view', 'audio_id' => $model->audio_id]);
            }
        } else {
            $model->loadDefaultValues();
        }

        return $this->render('create', [
            'model' => $model,
        ]);
    }

    /**
     * Updates an existing Audio model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param int $audio_id Audio ID
     * @return string|\yii\web\Response
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionUpdate($audio_id)
    {
        $this->layout = 'admin';
        $model = $this->findModel($audio_id);

        if ($this->request->isPost && $model->load($this->request->post()) && $model->save()) {
            return $this->redirect(['view', 'audio_id' => $model->audio_id]);
        }

        return $this->render('update', [
            'model' => $model,
        ]);
    }

    /**
     * Deletes an existing Audio model.
     * If deletion is successful, the browser will be redirected to the 'index' page.
     * @param int $audio_id Audio ID
     * @return \yii\web\Response
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionDelete($audio_id)
    {
        $this->layout = 'admin';
        $this->findModel($audio_id)->delete();

        return $this->redirect(['index']);
    }

    /**
     * Finds the Audio model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param int $audio_id Audio ID
     * @return Audio the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($audio_id)
    {
        if (($model = Audio::findOne(['audio_id' => $audio_id])) !== null) {
            return $model;
        }

        throw new NotFoundHttpException(Yii::t('app', 'The requested page does not exist.'));
    }
}
