<?php

namespace backend\controllers;

use common\models\Week;
use common\models\WeekSearch;
use Yii;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;

/**
 * WeekController implements the CRUD actions for Week model.
 */
class WeekController extends Controller
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
     * Lists all Week models.
     *
     * @return string
     */
    public function actionIndex()
    {
        $this->layout = 'admin';
        $searchModel = new WeekSearch();
        $dataProvider = $searchModel->search($this->request->queryParams);

        return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }

    /**
     * Displays a single Week model.
     * @param int $week_id Week ID
     * @return string
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionView($week_id)
    {
        $this->layout = 'admin';
        return $this->render('view', [
            'model' => $this->findModel($week_id),
        ]);
    }


    /**
     * Finds the Week model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param int $week_id Week ID
     * @return Week the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($week_id)
    {
        if (($model = Week::findOne(['week_id' => $week_id])) !== null) {
            return $model;
        }

        throw new NotFoundHttpException(Yii::t('app', 'The requested page does not exist.'));
    }
}
