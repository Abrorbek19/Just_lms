<?php

namespace frontend\controllers;

use common\models\Library;
use common\models\VideoAudioFile;
use common\models\VideoAudioFileSearch;
use common\models\Week;
use Yii;
use yii\helpers\ArrayHelper;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;
use yii\web\UploadedFile;

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
        $this->layout = 'teacher';
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
        $this->layout = 'teacher';
        return $this->render('view', [
            'model' => $this->findModel($video_audio_file_id),
        ]);
    }

    /**
     * Creates a new VideoAudioFile model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return string|\yii\web\Response
     */
    public function actionCreate()
    {
        $this->layout = 'teacher';
        $model = new VideoAudioFile();
        $library = ArrayHelper::map(Library::find()->andWhere(['status'=>10])->all(), 'library_id', 'library_category');
        $week = ArrayHelper::map(Week::find()->andWhere(['status'=>10])->all(), 'week_id', 'week_category');

        if ($this->request->isPost) {
            if ($model->load($this->request->post())) {
                $audio = UploadedFile::getInstance($model, 'audio_voice');
                $video = UploadedFile::getInstance($model,'video');
                $file_upload = UploadedFile::getInstance($model,'file_upload');
                $image = UploadedFile::getInstance($model,'image');

                if ($audio && $model->validate(false)){
                    $audioName =time().'.'.basename($audio->extension);
                    $audio->saveAs('upload/audio/'.$audioName);
                    $model->audio_voice = $audioName;
                }else{
                    $model->audio_voice = null;
                }
                if ($video && $model->validate(false)) {
                    $videoName =time().'.'.basename($video->extension);
                    $video->saveAs('upload/video/'.$videoName);
                    $model->video = $videoName;
                }else{
                    $model->video= null;
                }
                if ($file_upload && $model->validate(false)) {
                    $fileName =time().'.'.basename($file_upload->extension);
                    $file_upload->saveAs('upload/books/file/'.$fileName);
                    $model->file_upload = $fileName;
                }else{
                    $model->file_upload= null;
                }
                if ($image && $model->validate(false)) {
                    $imageName =time().'.'.basename($image->extension);
                    $image->saveAs('upload/books/image/'.$imageName);
                    $model->image = $imageName;
                }else{
                    $model->image= null;
                }
                $model->created_by = Yii::$app->user->identity->username;
                if ($model->save()){
                    return $this->redirect(['view', 'video_audio_file_id' => $model->video_audio_file_id]);
                }
            }
        } else {
            $model->loadDefaultValues();
        }

        return $this->render('create', [
            'library'=>$library,
            'week'=>$week,
            'model' => $model,
        ]);
    }

    /**
     * Updates an existing VideoAudioFile model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param int $video_audio_file_id Video Audio File ID
     * @return string|\yii\web\Response
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionUpdate($video_audio_file_id)
    {
        $this->layout = 'teacher';
        $model = $this->findModel($video_audio_file_id);
        $library = ArrayHelper::map(Library::find()->andWhere(['status'=>10])->all(), 'library_id', 'library_category');
        $week = ArrayHelper::map(Week::find()->andWhere(['status'=>10])->all(), 'week_id', 'week_category');

        if ($this->request->isPost) {
            if ($model->load($this->request->post())){
                $audio = UploadedFile::getInstance($model, 'audio_voice');
                $video = UploadedFile::getInstance($model,'video');
                $file_upload = UploadedFile::getInstance($model,'file_upload');
                $image = UploadedFile::getInstance($model,'image');

                if ($video && $model->validate(false)) {
                    $videoName2 ="update-".time().'.'.basename($video->extension);
                    $video->saveAs('upload/video/'. $videoName2);
                    $model->video = $videoName2;
                    $model->updated_by = Yii::$app->user->identity->username;
                } else {
                    $model->video = $model->getOldAttribute('video');
                }

                if ($audio && $model->validate(false)) {
                    $audioName2 ="update-".time().'.'.basename($audio->extension);
                    $audio->saveAs('upload/audio/'. $audioName2);
                    $model->audio_voice = $audioName2;
                    $model->updated_by = Yii::$app->user->identity->username;
                } else {
                    $model->audio_voice = $model->getOldAttribute('audio_voice');
                }

                if ($file_upload && $model->validate(false)) {
                    $fileName2 ="update-".time().'.'.basename($file_upload->extension);
                    $file_upload->saveAs('upload/books/file/'. $fileName2);
                    $model->file_upload = $fileName2;
                    $model->updated_by = Yii::$app->user->identity->username;
                } else {
                    $model->file_upload = $model->getOldAttribute('file_upload');
                }

                if ($image && $model->validate(false)) {
                    $imageName2 ="update-".time().'.'.basename($image->extension);
                    $image->saveAs('upload/books/image/'. $imageName2);
                    $model->image = $imageName2;
                    $model->updated_by = Yii::$app->user->identity->username;
                } else {
                    $model->image = $model->getOldAttribute('image');
                }
            }
            if ($model->save()){
                return $this->redirect(['view', 'video_audio_file_id' => $model->video_audio_file_id]);
            }else{
                var_dump($model->errors);die();
            }
        }else {
            $model->loadDefaultValues();
        }

        return $this->render('update', [
            'library'=>$library,
            'week'=>$week,
            'model' => $model,
        ]);
    }

    /**
     * Deletes an existing VideoAudioFile model.
     * If deletion is successful, the browser will be redirected to the 'index' page.
     * @param int $video_audio_file_id Video Audio File ID
     * @return \yii\web\Response
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionDelete($video_audio_file_id)
    {
        $this->layout = 'teacher';
        $this->findModel($video_audio_file_id)->delete();

        return $this->redirect(['index']);
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
