<?php

namespace backend\controllers;

use common\models\AudioCategory;
use common\models\AudioCategorySearch;
use Yii;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;

/**
 * AudioCategoryController implements the CRUD actions for AudioCategory model.
 */
class AudioCategoryController extends Controller
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
     * Lists all AudioCategory models.
     *
     * @return string
     */
    public function actionIndex()
    {
        $this->layout = 'admin';
        $searchModel = new AudioCategorySearch();
        $dataProvider = $searchModel->search($this->request->queryParams);

        return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }

    /**
     * Displays a single AudioCategory model.
     * @param int $audio_cate_id Audio Cate ID
     * @return string
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionView($audio_cate_id)
    {
        $this->layout = 'admin';
        return $this->render('view', [
            'model' => $this->findModel($audio_cate_id),
        ]);
    }


    /**
     * Finds the AudioCategory model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param int $audio_cate_id Audio Cate ID
     * @return AudioCategory the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($audio_cate_id)
    {
        if (($model = AudioCategory::findOne(['audio_cate_id' => $audio_cate_id])) !== null) {
            return $model;
        }

        throw new NotFoundHttpException(Yii::t('app', 'The requested page does not exist.'));
    }
}
