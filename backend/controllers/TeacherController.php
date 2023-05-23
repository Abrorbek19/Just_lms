<?php

namespace backend\controllers;

use common\models\Teacher;
use common\models\TeacherSearch;
use common\models\User;
use Yii;
use yii\filters\AccessControl;
use yii\helpers\ArrayHelper;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;

/**
 * TeacherController implements the CRUD actions for Teacher model.
 */
class TeacherController extends Controller
{
    /**
     * @inheritDoc
     */
    public function behaviors()
    {
        return array_merge(
            parent::behaviors(),
            [
                'access' => [
                    'class' => AccessControl::class,
                    'rules' => [
                        [
                            'actions' => ['login', 'error'],
                            'allow' => true,
                        ],
                        [
                            'actions' => ['logout', 'index','create','view','update','delete'],
                            'allow' => true,
                            'roles' => ['@'],
                        ],
                    ],
                ],
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
     * Lists all Teacher models.
     *
     * @return string
     */
    public function actionIndex()
    {
        $searchModel = new TeacherSearch();
        $dataProvider = $searchModel->search($this->request->queryParams);

        $this->layout = 'admin';
        return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }

    /**
     * Displays a single Teacher model.
     * @param int $teacher_id Teacher ID
     * @return string
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionView($teacher_id)
    {
        $this->layout='admin';
        return $this->render('view', [
            'model' => $this->findModel($teacher_id),
        ]);
    }

    /**
     * Creates a new Teacher model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return string|\yii\web\Response
     */
    public function actionCreate()
    {
        $this->layout='admin';
        $model = new Teacher();
        $user_id = ArrayHelper::map(User::find()->andWhere(['status'=>10,'role'=>2])->all(), 'user_id', 'username');
        $user_role = ArrayHelper::map(User::find()->andWhere(['status'=>10,'role'=>2])->all(), 'role', 'role');


        if ($this->request->isPost) {
            if ($model->load($this->request->post())) {
                $model->created_by = Yii::$app->user->identity->username;
                if ($model->save()){
                    return $this->redirect(['view', 'teacher_id' => $model->teacher_id]);
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
        ]);
    }

    /**
     * Updates an existing Teacher model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param int $teacher_id Teacher ID
     * @return string|\yii\web\Response
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionUpdate($teacher_id)
    {
        $this->layout='admin';
        $model = $this->findModel($teacher_id);
        $user_id = ArrayHelper::map(User::find()->andWhere(['status'=>10,'role'=>2])->all(), 'user_id', 'username');
        $user_role = ArrayHelper::map(User::find()->andWhere(['status'=>10,'role'=>2])->all(), 'role', 'role');

        if ($this->request->isPost) {
            if ($model->load($this->request->post())) {
                $model->updated_by = Yii::$app->user->identity->username;
                $model->save();
                return $this->redirect(['view', 'teacher_id' => $model->teacher_id]);
            }
        } else {
            $model->loadDefaultValues();
        }

        return $this->render('update', [
            'model' => $model,
            'user_id'=>$user_id,
            'user_role'=>$user_role,
        ]);
    }

    /**
     * Deletes an existing Teacher model.
     * If deletion is successful, the browser will be redirected to the 'index' page.
     * @param int $teacher_id Teacher ID
     * @return \yii\web\Response
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionDelete($teacher_id)
    {
        $this->layout='admin';
        $model =$this->findModel($teacher_id);
        $model->updateAttributes(['status' => 3]);
        return $this->redirect(['index']);
    }

    /**
     * Finds the Teacher model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param int $teacher_id Teacher ID
     * @return Teacher the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($teacher_id)
    {
        if (($model = Teacher::findOne(['teacher_id' => $teacher_id])) !== null) {
            return $model;
        }

        throw new NotFoundHttpException(Yii::t('app', 'The requested page does not exist.'));
    }
}
