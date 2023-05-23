<?php

namespace backend\controllers;

use common\models\Profile;
use common\models\ProfileSearch;
use Yii;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;
use yii\web\UploadedFile;

/**
 * ProfileController implements the CRUD actions for Profile model.
 */
class AdminProfileController extends Controller
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
     * Lists all Profile models.
     *
     * @return string
     */
    public function actionIndex()
    {
        $this->layout = 'admin';
        $searchModel = new ProfileSearch();
        $dataProvider = $searchModel->search($this->request->queryParams);
        $data = Profile::find()->where(['created_by' => \Yii::$app->user->identity->username])->one();

        return $this->render('index', [
            'data'=>$data,
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }

    /**
     * Displays a single Profile model.
     * @param int $profile_id Profile ID
     * @return string
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionView($profile_id)
    {
        return $this->render('view', [
            'model' => $this->findModel($profile_id),
        ]);
    }

    /**
     * Creates a new Profile model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return string|\yii\web\Response
     */
    public function actionCreate()
    {
        $this->layout = 'admin';
        $model = new Profile();

        if ($this->request->isPost) {
            if ($model->load($this->request->post())) {
                $model->image = UploadedFile::getInstance($model,'image');
                $filename =time().'.'.basename($model->image->extension);
                $model->image->saveAs('upload/image/'.$filename);
                $model->image=$filename;
                $model->created_by = Yii::$app->user->identity->username;
                $model->status = 10;
                if ($model->save()){
                    return $this->redirect(['index', 'profile_id' => $model->profile_id]);
                }else{
                    var_dump($model->errors); die();
                }
            }
        } else {
            $model->loadDefaultValues();
        }

        return $this->render('create', [
            'model' => $model,
        ]);
    }

    /**
     * Updates an existing Profile model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param int $profile_id Profile ID
     * @return string|\yii\web\Response
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionUpdate($profile_id)
    {
        $model = $this->findModel($profile_id);

        if ($this->request->isPost && $model->load($this->request->post()) && $model->save()) {
            return $this->redirect(['view', 'profile_id' => $model->profile_id]);
        }

        return $this->render('update', [
            'model' => $model,
        ]);
    }

    /**
     * Deletes an existing Profile model.
     * If deletion is successful, the browser will be redirected to the 'index' page.
     * @param int $profile_id Profile ID
     * @return \yii\web\Response
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionDelete($profile_id)
    {
        $this->findModel($profile_id)->delete();

        return $this->redirect(['index']);
    }

    /**
     * Finds the Profile model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param int $profile_id Profile ID
     * @return Profile the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($profile_id)
    {
        if (($model = Profile::findOne(['profile_id' => $profile_id])) !== null) {
            return $model;
        }

        throw new NotFoundHttpException(Yii::t('app', 'The requested page does not exist.'));
    }
}
