<?php

namespace backend\controllers;

use common\models\VideoAudioFile;
use common\models\VideoAudioFileSearch;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;

/**
 * VideoAudioFileController implements the CRUD actions for VideoAudioFile model.
 */
class VideoAudioFileController extends Controller
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
     * Lists all VideoAudioFile models.
     *
     * @return string
     */
    public function actionIndex()
    {
        $this->layout='admin';
        $searchModel = new VideoAudioFileSearch();
        $dataProvider = $searchModel->search($this->request->queryParams);

        return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }

    /**
     * Displays a single VideoAudioFile model.
     * @param int $video_audio_file_id Video Audio File ID
     * @return string
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionView($video_audio_file_id)
    {
        $this->layout='admin';
        return $this->render('view', [
            'model' => $this->findModel($video_audio_file_id),
        ]);
    }

    /**
     * Finds the VideoAudioFile model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param int $video_audio_file_id Video Audio File ID
     * @return VideoAudioFile the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($video_audio_file_id)
    {
        if (($model = VideoAudioFile::findOne(['video_audio_file_id' => $video_audio_file_id])) !== null) {
            return $model;
        }

        throw new NotFoundHttpException(Yii::t('app', 'The requested page does not exist.'));
    }
}
