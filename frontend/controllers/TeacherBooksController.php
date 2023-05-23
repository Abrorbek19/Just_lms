<?php

namespace frontend\controllers;

use common\models\Books;
use common\models\BooksSearch;
use common\models\Group;
use Yii;
use yii\helpers\ArrayHelper;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;
use yii\web\UploadedFile;

/**
 * BooksController implements the CRUD actions for Books model.
 */
class TeacherBooksController extends Controller
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

        return $this->render('index', [
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
     * Creates a new Books model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return string|\yii\web\Response
     */
    public function actionCreate()
    {
        $this->layout = 'teacher';
        $model = new Books();
        $user = Yii::$app->user->id;
        $group_id = ArrayHelper::map(Group::find()->andWhere(['status'=>10,'teacher_id'=>$user])->all(), 'group_id', 'group_name');

        if ($this->request->isPost) {
            if ($model->load($this->request->post())) {

                $file = UploadedFile::getInstance($model, 'books_image');
                $file2 = UploadedFile::getInstance($model,'books_upload');

                if ($file && $model->validate(false)){
                    $imageName =time().'.'.basename($file->extension);
                    $file->saveAs('upload/books/image/'.$imageName);
                    $model->books_image = $imageName;
                }else{
                    $model->books_image= 'no_image.jpg';
                }
                if ($file2 && $model->validate(false)) {
                    $fileName =time().'.'.basename($file2->extension);
                    $file2->saveAs('upload/books/file/'.$fileName);
                    $model->books_upload = $fileName;
                }else{
                    $model->books_upload= 'no_file.pdf';
                }
                $model->created_by = Yii::$app->user->identity->username;
                if ($model->save()){
                    return $this->redirect(['view', 'books_id' => $model->books_id]);
                }else{
                    var_dump($model->errors);die();
                }
            }
        } else {
            $model->loadDefaultValues();
        }

        return $this->render('create', [
            'group_id'=>$group_id,
            'model' => $model,
        ]);
    }

    /**
     * Updates an existing Books model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param int $books_id Books ID
     * @return string|\yii\web\Response
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionUpdate($books_id)
    {
        $this->layout = 'teacher';
        $model = $this->findModel($books_id);
        $user = Yii::$app->user->id;
        $group_id = ArrayHelper::map(Group::find()->andWhere(['status'=>10,'teacher_id'=>$user])->all(), 'group_id', 'group_name');

        if ($this->request->isPost) {
            if ($model->load($this->request->post())) {

                $file = UploadedFile::getInstance($model, 'books_image');
                $file2 = UploadedFile::getInstance($model, 'books_upload');

                if ($file && $model->validate(false)) {
                    $imageName = "update-" . time() . '.' . basename($file->extension);
                    $file->saveAs('upload/books/image/'.$imageName);
                    $model->books_image = $imageName;
                }else {
                    $model->books_image = $model->getOldAttribute('books_image');
                }
                if ($file2 && $model->validate(false)) {
                    $fileName = "update-" . time() . '.' . basename($file2->extension);
                    $file2->saveAs('upload/books/file'.$fileName);
                    $model->books_upload = $fileName;
                }else {
                    $model->books_upload = $model->getOldAttribute('books_upload');
                }
                $model->updated_by = Yii::$app->user->identity->username;
                if ($model->save()){
                    return $this->redirect(['view', 'books_id' => $model->books_id]);

                }else{
                    var_dump($model->errors);die();
                }
            }
        }

        return $this->render('update', [
            'group_id'=>$group_id,
            'model' => $model,
        ]);
    }

    /**
     * Deletes an existing Books model.
     * If deletion is successful, the browser will be redirected to the 'index' page.
     * @param int $books_id Books ID
     * @return \yii\web\Response
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionDelete($books_id)
    {
        $this->layout = 'teacher';
        $this->findModel($books_id)->delete();

        return $this->redirect(['index']);
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
