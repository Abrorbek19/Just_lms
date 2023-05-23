<?php

namespace backend\controllers;

use common\models\Event;
use common\models\EventSearch;
use Yii;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;

/**
 * EventController implements the CRUD actions for Event model.
 */
class EventController extends Controller
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
     * Lists all Event models.
     *
     * @return string
     */
    public function actionIndex()
    {
        $this->layout = 'blank';
        $searchModel = new EventSearch();
        $dataProvider = $searchModel->search($this->request->queryParams);

//        return $this->render('index', [
//            'searchModel' => $searchModel,
//            'dataProvider' => $dataProvider,
//        ]);
        $events = Event::find()->all();
        $tasks = [];
        foreach ($events as $eve)
        {
            $event = new \yii2fullcalendar\models\Event();
            $event->id = $eve->event_id;
            $event->backgroundColor = 'green';
            $event->title = $eve->event_name;
            $event->start = $eve->event_date;
            $tasks[] = $event;
        }

        return $this->render('index', [
            //'searchModel' => $searchModel,
            'events' => $tasks,
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }

    /**
     * Displays a single Event model.
     * @param int $event_id Event ID
     * @return string
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionView($event_id)
    {
        $this->layout = 'admin';
        return $this->render('view', [
            'model' => $this->findModel($event_id),
        ]);
    }

    /**
     * Creates a new Event model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return string|\yii\web\Response
     */
    public function actionCreate()
    {
        $this->layout='admin';
        $model = new Event();

        if ($this->request->isPost) {
            if ($model->load($this->request->post())) {
                $model->created_by = Yii::$app->user->identity->username;
                $model->event_date = Yii::$app->formatter->asDate($_POST['Event']['event_date'], 'yyyy-MM-dd HH:mm');
                if ($model->save()){
                    return $this->redirect(['view', 'event_id' => $model->event_id]);
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
     * Updates an existing Event model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param int $event_id Event ID
     * @return string|\yii\web\Response
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionUpdate($event_id)
    {
        $this->layout='admin';
        $model = $this->findModel($event_id);

        if ($this->request->isPost && $model->load($this->request->post())){
            $model->updated_by = Yii::$app->user->identity->username;
            if ($model->save()){
                return $this->redirect(['view', 'event_id' => $model->event_id]);
            }
        }

        return $this->render('update', [
            'model' => $model,
        ]);
    }

    /**
     * Deletes an existing Event model.
     * If deletion is successful, the browser will be redirected to the 'index' page.
     * @param int $event_id Event ID
     * @return \yii\web\Response
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionDelete($event_id)
    {
        $this->layout='admin';
        $this->findModel($event_id)->delete();

        return $this->redirect(['index']);
    }

    /**
     * Finds the Event model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param int $event_id Event ID
     * @return Event the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($event_id)
    {
        if (($model = Event::findOne(['event_id' => $event_id])) !== null) {
            return $model;
        }

        throw new NotFoundHttpException(Yii::t('app', 'The requested page does not exist.'));
    }
}
