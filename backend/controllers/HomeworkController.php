<?php

namespace backend\controllers;

use common\models\Homework;
use common\models\HomeworkSearch;
use Yii;
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
        $this->layout = 'admin';
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
        $this->layout = 'admin';
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
