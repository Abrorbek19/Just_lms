<?php

namespace frontend\controllers;

use common\models\Group;
use common\models\Library;
use common\models\Week;
use common\models\WeekSearch;
use yii\helpers\ArrayHelper;
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
        $this->layout = 'teacher';
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
        $this->layout = 'teacher';
        return $this->render('view', [
            'model' => $this->findModel($week_id),
        ]);
    }

    /**
     * Creates a new Week model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return string|\yii\web\Response
     */
    public function actionCreate()
    {
        $this->layout = 'teacher';
        $model = new Week();
        $library = ArrayHelper::map(Library::find()->andWhere(['status'=>10])->all(), 'library_id', 'library_category');

        if ($this->request->isPost) {
            if ($model->load($this->request->post())) {
                $model->created_by = \Yii::$app->user->identity->username;
                if ($model->save()){
                    return $this->redirect(['view', 'week_id' => $model->week_id]);
                }
            }
        } else {
            $model->loadDefaultValues();
        }

        return $this->render('create', [
            'library'=>$library,
            'model' => $model,
        ]);
    }

    /**
     * Updates an existing Week model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param int $week_id Week ID
     * @return string|\yii\web\Response
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionUpdate($week_id)
    {
        $library = ArrayHelper::map(Library::find()->andWhere(['status'=>10])->all(), 'library_id', 'library_category');
        $this->layout = 'teacher';
        $model = $this->findModel($week_id);

        if ($this->request->isPost) {
            if ($model->load($this->request->post())) {
                $model->updated_by = \Yii::$app->user->identity->username;
                if ($model->save()){
                    return $this->redirect(['view', 'week_id' => $model->week_id]);
                }
            }
        } else {
            $model->loadDefaultValues();
        }

        return $this->render('update', [
            'library'=>$library,
            'model' => $model,
        ]);
    }

    /**
     * Deletes an existing Week model.
     * If deletion is successful, the browser will be redirected to the 'index' page.
     * @param int $week_id Week ID
     * @return \yii\web\Response
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionDelete($week_id)
    {
        $this->findModel($week_id)->delete();

        return $this->redirect(['index']);
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
