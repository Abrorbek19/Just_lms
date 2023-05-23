<?php

namespace frontend\controllers;

use common\models\Group;
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
class TeacherVideoController extends Controller
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
        $this->layout = 'teacher';
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
        $this->layout = 'teacher';
        return $this->render('view', [
            'model' => $this->findModel($video_id),
        ]);
    }

    /**
     * Creates a new Video model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return string|\yii\web\Response
     */
    public function actionCreate()
    {
        $this->layout = 'teacher';
        $model = new Video();
        $user = Yii::$app->user->id;
        $group_id = ArrayHelper::map(Group::find()->andWhere(['status'=>10,'teacher_id'=>$user])->all(), 'group_id', 'group_name');

        if ($this->request->isPost) {
            if ($model->load($this->request->post())) {
                $video = UploadedFile::getInstance($model,'video_upload');
//                echo var_dump($model && $video);die();
                if ( $video && $model->validate(false)){
                    $videoName = time().'.'.basename($video->extension);
                    $video->saveAs('upload/video/'.$videoName);
                    $model->video_upload = $videoName;
                    $model->created_by = Yii::$app->user->identity->username;
                }else{
                    $model->video_upload= 'no_video.mp4';
                }
//                echo var_dump($model);die();
                if ($model->save()){
                    return $this->redirect(['view', 'video_id' => $model->video_id]);
                }else{
                    var_dump($model->errors);die();
                }
            }
        } else {
            $model->loadDefaultValues();
        }

        return $this->render('create', [
            'group_id'=>$group_id,
            'model' => $model,
        ]);
    }

    /**
     * Updates an existing Video model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param int $video_id Video ID
     * @return string|\yii\web\Response
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionUpdate($video_id)
    {
        $this->layout = 'teacher';
        $model = $this->findModel($video_id);
        $user = Yii::$app->user->id;
        $group_id = ArrayHelper::map(Group::find()->andWhere(['status'=>10,'teacher_id'=>$user])->all(), 'group_id', 'group_name');

        if ($this->request->isPost) {
            if ($model->load($this->request->post())) {

                $video = UploadedFile::getInstance($model, 'video_upload');

                if ($video && $model->validate(false)) {
                    $videoName2 ="update-".time().'.'.basename($video->extension);
                    $video->saveAs('upload/video/'. $videoName2);
                    $model->video_upload = $videoName2;
                    $model->updated_by = Yii::$app->user->identity->username;
                } else {
                    $model->video_upload = $model->getOldAttribute('video_upload');
                }
                if ($model->save()) {
                    return $this->redirect(['view', 'video_id' => $model->video_id]);
                } else {
                    // show errors
                    var_dump($model->errors);die();
                }
            }

        }

        return $this->render('update', [
            'group_id'=>$group_id,
            'model' => $model,
        ]);
    }

    /**
     * Deletes an existing Video model.
     * If deletion is successful, the browser will be redirected to the 'index' page.
     * @param int $video_id Video ID
     * @return \yii\web\Response
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionDelete($video_id)
    {
        $this->findModel($video_id)->delete();

        return $this->redirect(['index']);
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
