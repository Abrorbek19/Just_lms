<?php

namespace frontend\controllers;

use common\models\Audio;
use common\models\AudioCategory;
use common\models\Books;
use common\models\BooksSearch;

use common\models\Student;
use Yii;
use yii\helpers\ArrayHelper;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;
use yii\web\UploadedFile;

/**
 * BooksController implements the CRUD actions for Books model.
 */
class BooksController extends Controller
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
     * Lists all Books models.
     *
     * @return string
     */
    public function actionIndex()
    {
        $this->layout = 'teacher';
        $searchModel = new BooksSearch();
        $dataProvider = $searchModel->search($this->request->queryParams);

        $user = Yii::$app->user->identity;
        $student = Student::findOne(['user_id' => $user->user_id]);
        $group = $student->group_id;
        $book = Books::find()->where(['group_id'=>$group,'status'=>10])->all();
        $audcat = AudioCategory::find()->where(['group_id'=>$group,'status'=>10])->all();

        return $this->render('index', [
            'aud_cat'=>$audcat,
//            'audio'=>$audio,
            'book'=>$book,
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }

    /**
     * Displays a single Books model.
     * @param int $books_id Books ID
     * @return string
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionView($books_id)
    {
        $this->layout = 'teacher';
        return $this->render('view', [
            'model' => $this->findModel($books_id),
        ]);
    }


    /**
     * Finds the Books model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param int $books_id Books ID
     * @return Books the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($books_id)
    {
        if (($model = Books::findOne(['books_id' => $books_id])) !== null) {
            return $model;
        }

        throw new NotFoundHttpException(Yii::t('app', 'The requested page does not exist.'));
    }
}
