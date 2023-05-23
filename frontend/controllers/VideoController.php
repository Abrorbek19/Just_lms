<?php

namespace frontend\controllers;

use common\models\Group;
use common\models\Student;
use common\models\Video;
use common\models\VideoSearch;
use Yii;
use yii\helpers\ArrayHelper;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;
use yii\web\UploadedFile;

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
        $this->layout = 'student';
        $searchModel = new VideoSearch();
        $dataProvider = $searchModel->search($this->request->queryParams);

        $user = Yii::$app->user->identity;
        $student = Student::findOne(['user_id' => $user->user_id]);
        $group = $student->group_id;
        $video = Video::find()->where(['status'=>10,'group_id'=>$group])->all();
        return $this->render('index', [
            'video'=>$video,
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
        $user = Yii::$app->user->identity;
        $student = Student::findOne(['user_id' => $user->user_id]);
        $group = $student->group_id;
        $video = Video::findOne(['video_id' => $video_id, 'group_id' => $group]);
        if ($video === null){
            throw new NotFoundHttpException('video yo\'q');
        }

        $this->layout = 'student';
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
