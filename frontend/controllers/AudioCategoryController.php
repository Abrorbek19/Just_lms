<?php

namespace frontend\controllers;

use common\models\AudioCategory;
use common\models\AudioCategorySearch;
use common\models\Group;
use Yii;
use yii\helpers\ArrayHelper;
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
        $this->layout = 'teacher';
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
        $this->layout = 'teacher';
        return $this->render('view', [
            'model' => $this->findModel($audio_cate_id),
        ]);
    }

    /**
     * Creates a new AudioCategory model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return string|\yii\web\Response
     */
    public function actionCreate()
    {
        $this->layout = 'teacher';
        $model = new AudioCategory();
        $user = Yii::$app->user->id;
        $group_id = ArrayHelper::map(Group::find()->andWhere(['status'=>10,'teacher_id'=>$user])->all(), 'group_id', 'group_name');

        if ($this->request->isPost) {
            if ($model->load($this->request->post())) {
                $model->created_by = Yii::$app->user->identity->username;
                if ($model->save()){
                    return $this->redirect(['view', 'audio_cate_id' => $model->audio_cate_id]);
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
     * Updates an existing AudioCategory model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param int $audio_cate_id Audio Cate ID
     * @return string|\yii\web\Response
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionUpdate($audio_cate_id)
    {
        $this->layout = 'teacher';
        $model = $this->findModel($audio_cate_id);
        $user = Yii::$app->user->id;
        $group_id = ArrayHelper::map(Group::find()->andWhere(['status'=>10,'teacher_id'=>$user])->all(), 'group_id', 'group_name');

        if ($this->request->isPost && $model->load($this->request->post())) {
            $model->updated_by = Yii::$app->user->identity->username;
            if ($model->save()){
                return $this->redirect(['view', 'audio_cate_id' => $model->audio_cate_id]);
            }else{
                var_dump($model->errors);die();
            }
        }

        return $this->render('update', [
            'group_id'=>$group_id,
            'model' => $model,
        ]);
    }

    /**
     * Deletes an existing AudioCategory model.
     * If deletion is successful, the browser will be redirected to the 'index' page.
     * @param int $audio_cate_id Audio Cate ID
     * @return \yii\web\Response
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionDelete($audio_cate_id)
    {
        $this->layout = 'teacher';
        $this->findModel($audio_cate_id)->delete();

        return $this->redirect(['index']);
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
