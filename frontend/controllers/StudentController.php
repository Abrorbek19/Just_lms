<?php

namespace frontend\controllers;

use common\models\Group;
use common\models\Student;
use common\models\StudentSearch;
use Yii;
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
    public function actionIndex()
    {
        $searchModel = new StudentSearch();
        $dataProvider = $searchModel->search($this->request->queryParams);
        $student = Student::find()->where(['user_id' => \Yii::$app->user->id])->one();
        $this->layout = 'student';
        return $this->render('index', [
            'student' => $student,
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
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
        return $this->render('view', [
            'model' => $this->findModel($student_id),
        ]);
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
