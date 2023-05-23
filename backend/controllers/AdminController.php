<?php

namespace backend\controllers;

use common\models\Admin;
use common\models\AdminSearch;
use common\models\Group;
use common\models\User;
use Yii;
use yii\helpers\ArrayHelper;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;

/**
 * AdminController implements the CRUD actions for Admin model.
 */
class AdminController extends Controller
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
     * Lists all Admin models.
     *
     * @return string
     */
    public function actionIndex()
    {
        $this->layout='admin';
        $searchModel = new AdminSearch();
        $dataProvider = $searchModel->search($this->request->queryParams);

        return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }

    /**
     * Displays a single Admin model.
     * @param int $admin_id Admin ID
     * @return string
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionView($admin_id)
    {
        $this->layout='admin';
        return $this->render('view', [
            'model' => $this->findModel($admin_id),
        ]);
    }

    /**
     * Creates a new Admin model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return string|\yii\web\Response
     */
    public function actionCreate()
    {
        $this->layout='admin';
        $model = new Admin();

        $user_id = ArrayHelper::map(User::find()->andWhere(['status'=>10,'role'=>1])->all(), 'user_id', 'username');
        $user_role = ArrayHelper::map(User::find()->andWhere(['status'=>10,'role'=>1])->all(), 'role', 'role');

        if ($this->request->isPost) {
            if ($model->load($this->request->post())) {
                $model->created_by = Yii::$app->user->identity->username;
                if ($model->save()){
                    return $this->redirect(['view', 'admin_id' => $model->admin_id]);
                }else{
                    var_dump($model->errors);die();
                }
            }
        } else {
            $model->loadDefaultValues();
        }

        return $this->render('create', [
            'user_id'=>$user_id,
            'user_role'=>$user_role,
            'model' => $model,
        ]);
    }

    /**
     * Updates an existing Admin model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param int $admin_id Admin ID
     * @return string|\yii\web\Response
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionUpdate($admin_id)
    {
        $this->layout='admin';
        $user_id = ArrayHelper::map(User::find()->andWhere(['status'=>10,'role'=>1])->all(), 'user_id', 'username');
        $user_role = ArrayHelper::map(User::find()->andWhere(['status'=>10,'role'=>1])->all(), 'role', 'role');
        $model = $this->findModel($admin_id);

        if ($this->request->isPost) {
            if ($model->load($this->request->post())) {
                $model->updated_by = Yii::$app->user->identity->username;
                if ($model->save()){
                    return $this->redirect(['view', 'admin_id' => $model->admin_id]);
                }else{
                    var_dump($model->errors);die();
                }
            }
        } else {
            $model->loadDefaultValues();
        }

        return $this->render('update', [
            'user_id'=>$user_id,
            'user_role'=>$user_role,
            'model' => $model,
        ]);
    }

    /**
     * Deletes an existing Admin model.
     * If deletion is successful, the browser will be redirected to the 'index' page.
     * @param int $admin_id Admin ID
     * @return \yii\web\Response
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionDelete($admin_id)
    {
        $this->layout='admin';
        $this->findModel($admin_id)->delete();

        return $this->redirect(['index']);
    }

    /**
     * Finds the Admin model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param int $admin_id Admin ID
     * @return Admin the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($admin_id)
    {
        if (($model = Admin::findOne(['admin_id' => $admin_id])) !== null) {
            return $model;
        }

        throw new NotFoundHttpException(Yii::t('app', 'The requested page does not exist.'));
    }
}
