<?php

namespace frontend\controllers;

use common\models\Library;
use common\models\LibrarySearch;
use common\models\VideoAudioFile;
use common\models\Week;
use Yii;
use yii\helpers\ArrayHelper;
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
        $this->layout = 'student';
        $searchModel = new LibrarySearch();
        $dataProvider = $searchModel->search($this->request->queryParams);
        $library = Library::find()->where(['status'=>10])->all();

        return $this->render('index', [
            'library'=>$library,
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
        $this->layout = 'student';
        return $this->render('view', [
            'model' => $this->findModel($library_id),
        ]);
    }

    public function actionWeek($n){
        $this->layout = 'student';

        $week = Week::find()->where(['status'=>10,'library_category'=>$n])->all();

        return $this->render('week', [
            'week'=>$week,
        ]);
    }
    public function actionVideoAudioFile($n,$week){

        $this->layout = 'student';

        $audio = VideoAudioFile::find()->where(['status'=>10,'library_category'=>$n,'week_category'=>$week])->all();
        $library = Library::find()->where(['status'=>10])->all();
        $libraryId = $library[0];
        return $this->render('video-audio-file', [
            'library'=>$libraryId,
            'audio'=>$audio,
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
