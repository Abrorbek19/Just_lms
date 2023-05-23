<?php

namespace backend\controllers;

use common\models\Group;
use common\models\Student;
use common\models\StudentSearch;
use common\models\User;
use Yii;
use yii\helpers\ArrayHelper;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;

/**
 * StudentController implements the CRUD actions for Student model.
 */
class StudentController extends Controller
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
     * Lists all Student models.
     *
     * @return string
     */
    public function actionIndex($pageSize = 10)
    {
        $this->layout='admin';
        $searchModel = new StudentSearch();
        $dataProvider = $searchModel->search($this->request->queryParams,$pageSize);


        return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
            'pageSize' => $pageSize,
        ]);
    }

    /**
     * Displays a single Student model.
     * @param int $student_id Student ID
     * @return string
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionView($student_id)
    {
        $this->layout='admin';
        return $this->render('view', [
            'model' => $this->findModel($student_id),
        ]);
    }

    /**
     * Creates a new Student model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return string|\yii\web\Response
     */
    public function actionCreate()
    {
        $this->layout='admin';
        $model = new Student();

        $user_id = ArrayHelper::map(User::find()->andWhere(['status'=>10,'role'=>3])->all(), 'user_id', 'username');
        $user_role = ArrayHelper::map(User::find()->andWhere(['status'=>10,'role'=>3])->all(), 'role', 'role');
        $group_id = ArrayHelper::map(Group::find()->andWhere(['status'=>10])->all(), 'group_id', 'group_name');


        if ($this->request->isPost) {
            if ($model->load($this->request->post())) {
                $model->created_by = Yii::$app->user->identity->username;
                if ($model->save()){
                    return $this->redirect(['view', 'student_id' => $model->student_id]);
                }else{
                    var_dump($model->errors); die();
                }
            }
        } else {
            $model->loadDefaultValues();
        }

        return $this->render('create', [
            'model' => $model,
            'user_id'=>$user_id,
            'user_role'=>$user_role,
            'group_id'=>$group_id,
        ]);
    }

    /**
     * Updates an existing Student model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param int $student_id Student ID
     * @return string|\yii\web\Response
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionUpdate($student_id)
    {
        $this->layout='admin';
        $model = $this->findModel($student_id);

        $user_id = ArrayHelper::map(User::find()->andWhere(['status'=>10,'role'=>3])->all(), 'user_id', 'username');
        $user_role = ArrayHelper::map(User::find()->andWhere(['status'=>10,'role'=>3])->all(), 'role', 'role');
        $group_id = ArrayHelper::map(Group::find()->andWhere(['status'=>10])->all(), 'group_id', 'group_name');

        if ($this->request->isPost) {
            if ($model->load($this->request->post())) {
                $model->updated_by = Yii::$app->user->identity->username;
                $model->save();
                return $this->redirect(['view', 'student_id' => $model->student_id]);
            }
        } else {
            $model->loadDefaultValues();
        }

        return $this->render('update', [
            'model' => $model,
            'user_id'=>$user_id,
            'user_role'=>$user_role,
            'group_id'=>$group_id,
        ]);
    }

    /**
     * Deletes an existing Student model.
     * If deletion is successful, the browser will be redirected to the 'index' page.
     * @param int $student_id Student ID
     * @return \yii\web\Response
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionDelete($student_id)
    {
        $this->layout='admin';
        $model = $this->findModel($student_id);
        $model->updateAttributes(['status' => 3]);
        return $this->redirect(['index']);
    }

    /**
     * Finds the Student model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param int $student_id Student ID
     * @return Student the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($student_id)
    {
        if (($model = Student::findOne(['student_id' => $student_id])) !== null) {
            return $model;
        }

        throw new NotFoundHttpException(Yii::t('app', 'The requested page does not exist.'));
    }
}
