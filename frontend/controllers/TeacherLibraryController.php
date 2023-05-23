<?php

namespace frontend\controllers;

use common\models\Library;
use common\models\LibrarySearch;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;

/**
 * LibraryController implements the CRUD actions for Library model.
 */
class TeacherLibraryController extends Controller
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
     * Lists all Library models.
     *
     * @return string
     */
    public function actionIndex()
    {
        $this->layout = 'teacher';
        $searchModel = new LibrarySearch();
        $dataProvider = $searchModel->search($this->request->queryParams);

        return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }

    /**
     * Displays a single Library model.
     * @param int $library_id Library ID
     * @return string
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionView($library_id)
    {
        $this->layout = 'teacher';
        return $this->render('view', [
            'model' => $this->findModel($library_id),
        ]);
    }

    /**
     * Creates a new Library model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return string|\yii\web\Response
     */
    public function actionCreate()
    {
        $this->layout = 'teacher';
        $model = new Library();

        if ($this->request->isPost) {
            if ($model->load($this->request->post())) {
                $model->created_by = \Yii::$app->user->identity->username;
                if ($model->save())
                {
                    return $this->redirect(['view', 'library_id' => $model->library_id]);

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
     * Updates an existing Library model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param int $library_id Library ID
     * @return string|\yii\web\Response
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionUpdate($library_id)
    {
        $this->layout = 'teacher';
        $model = $this->findModel($library_id);

        if ($this->request->isPost) {
            if ($model->load($this->request->post())) {
                $model->updated_by = \Yii::$app->user->identity->username;
                if ($model->save())
                {
                    return $this->redirect(['view', 'library_id' => $model->library_id]);

                }
            }
        } else {
            $model->loadDefaultValues();
        }

        return $this->render('update', [
            'model' => $model,
        ]);
    }

    /**
     * Deletes an existing Library model.
     * If deletion is successful, the browser will be redirected to the 'index' page.
     * @param int $library_id Library ID
     * @return \yii\web\Response
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionDelete($library_id)
    {
        $this->findModel($library_id)->delete();

        return $this->redirect(['index']);
    }

    /**
     * Finds the Library model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param int $library_id Library ID
     * @return Library the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($library_id)
    {
        if (($model = Library::findOne(['library_id' => $library_id])) !== null) {
            return $model;
        }

        throw new NotFoundHttpException(Yii::t('app', 'The requested page does not exist.'));
    }
}
