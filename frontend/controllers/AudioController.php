<?php

namespace frontend\controllers;

use common\models\Audio;
use common\models\AudioCategory;
use common\models\AudioSearch;
use common\models\Group;
use Yii;
use yii\base\Model;
use yii\helpers\ArrayHelper;
use yii\helpers\Json;
use yii\web\BadRequestHttpException;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;
use yii\web\Response;
use yii\web\UploadedFile;

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
        $this->layout = 'teacher';
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
        $this->layout = 'teacher';
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
        $this->layout = 'teacher';
        $model = new Audio();

        $user = Yii::$app->user->id;
        $group_id = ArrayHelper::map(Group::find()->andWhere(['status'=>10,'teacher_id'=>$user])->all(), 'group_id', 'group_name');
        $audio_cate = ArrayHelper::map(AudioCategory::find()->andWhere(['status'=>10])->all(),'audio_cate_id','audio_cate_name');


        if ($this->request->isPost) {
            if ($model->load($this->request->post())) {
                $audio =  UploadedFile::getInstance($model, 'audio_voice');
                if ($audio && $model->validate(false)){
                    $audioName = time().'.'.basename($audio->extension);
                    $audio->saveAs('upload/audio/'.$audioName);
                    $model->audio_voice=$audioName;
                }else{
                    $model->audio_voice = 'no_audio.mp4';
                }
                $model->created_by = Yii::$app->user->identity->username;
                if ($model->save()){
                    return $this->redirect(['view', 'audio_id' => $model->audio_id]);
                }else{
                    var_dump($model->errors);die();
                }
            }
        } else {
            $model->loadDefaultValues();
        }

        return $this->render('create', [
            'group_id'=>$group_id,
            'audio_cate'=>$audio_cate,
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
        $this->layout = 'teacher';
        $model = $this->findModel($audio_id);
        $user = Yii::$app->user->id;
        $group_id = ArrayHelper::map(Group::find()->andWhere(['status'=>10,'teacher_id'=>$user])->all(), 'group_id', 'group_name');
        $audio_cate = ArrayHelper::map(AudioCategory::find()->andWhere(['status'=>10])->all(),'audio_cate_id','audio_cate_name');

        if ($this->request->isPost) {
            if ($model->load($this->request->post())) {
                $audio = UploadedFile::getInstance($model, 'audio_voice');
                if ($audio && $model->validate(false)) {
                    $audioName = "update-" . time() . '.' . $audio->extension;
                    $audio->saveAs('upload/audio/' . $audioName);
                    $model->audio_voice = $audioName;
                } else {
                    $model->audio_voice = $model->getOldAttribute('audio_voice');
                }

                $model->updated_by = Yii::$app->user->identity->username;

                if ($model->save()) {
                    return $this->redirect(['view', 'audio_id' => $model->audio_id]);
                } else {
                    var_dump($model->errors);
                    die();
                }
            }
        } else {
            $model->loadDefaultValues();
        }


        return $this->render('update', [
            'group_id'=>$group_id,
            'audio_cate'=>$audio_cate,
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
        $this->layout = 'teacher';
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

    public function actionGetCategories($group_id)
    {
        $categories = AudioCategory::find()->where(['status'=>10,'group_id' => $group_id])->all();
        $data = [];
        foreach ($categories as $category) {
            $data[] = ['id' => $category->audio_cate_id, 'name' => $category->audio_cate_name];
        }
        return $data;
    }
    public function actionSub() {
        Yii::$app->response->format = \yii\web\Response::FORMAT_JSON;
        if (isset($_POST['depdrop_parents'])) {
            $parents = $_POST['depdrop_parents'];
            if ($parents != null) {
                $group_id = $parents[0];
                $out = self::actionGetCategories($group_id);
                // the getSubCatList function will query the database based on the
                // cat_id and return an array like below:
                // [
                //    ['id'=>'<sub-cat-id-1>', 'name'=>'<sub-cat-name1>'],
                //    ['id'=>'<sub-cat_id_2>', 'name'=>'<sub-cat-name2>']
                // ]
                return ['output'=>$out, 'selected'=>''];
            }
        }
        return ['output'=>'', 'selected'=>''];
    }

}
