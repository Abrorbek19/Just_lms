<?php

namespace frontend\controllers;

use common\models\Group;
use common\models\Homework;
use common\models\HomeworkSearch;
use common\models\Student;
use Yii;
use yii\helpers\ArrayHelper;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;

/**
 * HomeworkController implements the CRUD actions for Homework model.
 */
class HomeworkController extends Controller
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
        $user = Yii::$app->user->identity;
        $student = Student::findOne(['user_id' => $user->user_id]);
        $group = $student->group_id;
        $homework = Homework::find()->where(['group_id'=>$group,'status'=>10])->all();

        return $this->render('index', [
            'homework'=> $homework,
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
