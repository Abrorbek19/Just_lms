<?php

namespace frontend\controllers;

use common\models\Group;
use common\models\Homework;
use common\models\HomeworkSearch;
use Yii;
use yii\helpers\ArrayHelper;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;

/**
 * HomeworkController implements the CRUD actions for Homework model.
 */
class TeacherHomeworkController extends Controller
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
     * Lists all Homework models.
     *
     * @return string
     */
    public function actionIndex()
    {
        $this->layout = 'teacher';
        $searchModel = new HomeworkSearch();
        $dataProvider = $searchModel->search($this->request->queryParams);

        return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }

    /**
     * Displays a single Homework model.
     * @param int $homework_id Homework ID
     * @return string
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionView($homework_id)
    {
        $this->layout = 'teacher';
        return $this->render('view', [
            'model' => $this->findModel($homework_id),
        ]);
    }

    /**
     * Creates a new Homework model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return string|\yii\web\Response
     */
    public function actionCreate()
    {
        $this->layout = 'teacher';
        $model = new Homework();
        $user = Yii::$app->user->id;
        $group_id = ArrayHelper::map(Group::find()->andWhere(['status'=>10,'teacher_id'=>$user])->all(), 'group_id', 'group_name');
        if ($this->request->isPost) {
            if ($model->load($this->request->post())) {
                $model->created_by = Yii::$app->user->identity->username;
                if ($model->save()){
                    return $this->redirect(['view', 'homework_id' => $model->homework_id]);
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
     * Updates an existing Homework model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param int $homework_id Homework ID
     * @return string|\yii\web\Response
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionUpdate($homework_id)
    {
        $this->layout = 'teacher';
        $model = $this->findModel($homework_id);
        $user = Yii::$app->user->id;
        $group_id = ArrayHelper::map(Group::find()->andWhere(['status'=>10,'teacher_id'=>$user])->all(), 'group_id', 'group_name');

        if ($this->request->isPost) {
            if ($model->load($this->request->post())) {
                $model->updated_by = Yii::$app->user->identity->username;
                if ($model->save()){
                    return $this->redirect(['view', 'homework_id' => $model->homework_id]);
                }else{
                    var_dump($model->errors);die();
                }
            }
        } else {
            $model->loadDefaultValues();
        }

        return $this->render('update', [
            'group_id'=>$group_id,
            'model' => $model,
        ]);
    }

    /**
     * Deletes an existing Homework model.
     * If deletion is successful, the browser will be redirected to the 'index' page.
     * @param int $homework_id Homework ID
     * @return \yii\web\Response
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionDelete($homework_id)
    {
        $this->layout = 'teacher';
        $this->findModel($homework_id)->delete();

        return $this->redirect(['index']);
    }

    /**
     * Finds the Homework model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param int $homework_id Homework ID
     * @return Homework the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($homework_id)
    {
        if (($model = Homework::findOne(['homework_id' => $homework_id])) !== null) {
            return $model;
        }

        throw new NotFoundHttpException(Yii::t('app', 'The requested page does not exist.'));
    }
}
