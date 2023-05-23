<?php

namespace backend\controllers;

use common\models\Video;
use common\models\VideoSearch;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;

/**
 * VideoController implements the CRUD actions for Video model.
 */
class VideoController extends Controller
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
     * Lists all Video models.
     *
     * @return string
     */
    public function actionIndex()
    {
        $this->layout = 'admin';
        $searchModel = new VideoSearch();
        $dataProvider = $searchModel->search($this->request->queryParams);

        return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }

    /**
     * Displays a single Video model.
     * @param int $video_id Video ID
     * @return string
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionView($video_id)
    {
        $this->layout='admin';
        return $this->render('view', [
            'model' => $this->findModel($video_id),
        ]);
    }

    /**
     * Finds the Video model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param int $video_id Video ID
     * @return Video the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($video_id)
    {
        if (($model = Video::findOne(['video_id' => $video_id])) !== null) {
            return $model;
        }

        throw new NotFoundHttpException(Yii::t('app', 'The requested page does not exist.'));
    }
}
