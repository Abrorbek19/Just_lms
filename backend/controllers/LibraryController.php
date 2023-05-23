<?php

namespace backend\controllers;

use common\models\Library;
use common\models\LibrarySearch;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;

/**
 * LibraryController implements the CRUD actions for Library model.
 */
class LibraryController extends Controller
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
        $this->layout = 'admin';
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
        $this->layout = 'admin';
        return $this->render('view', [
            'model' => $this->findModel($library_id),
        ]);
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
