<?php

namespace backend\controllers;

use common\models\Group;
use common\models\GroupForm;
use common\models\GroupSearch;
use common\models\Teacher;
use common\models\User;
use Yii;
use yii\helpers\ArrayHelper;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;

/**
 * GroupController implements the CRUD actions for Group model.
 */
class GroupController extends Controller
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
     * Lists all Group models.
     *
     * @return string
     */
    public function actionIndex()
    {
        $searchModel = new GroupSearch();
        $dataProvider = $searchModel->search($this->request->queryParams);
        $this->layout = 'admin';
        return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }

    /**
     * Displays a single Group model.
     * @param int $group_id Group ID
     * @return string
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionView($group_id)
    {
        $this->layout='admin';
        return $this->render('view', [
            'model' => $this->findModel($group_id),
        ]);
    }

    /**
     * Creates a new Group model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return string|\yii\web\Response
     */
    public function actionCreate()
    {
        $this->layout='admin';
        $model = new Group();
        $teacher_id = ArrayHelper::map(User::find()->andWhere(['status'=>10,'role'=>2])->all(), 'user_id', 'username');
//        $this->layout = 'create';
        if ($this->request->isPost) {
            if ($model->load($this->request->post())) {
                $model->created_by = Yii::$app->user->identity->username;
                $model->lesson_days = implode(",",$model->lesson_days);
                if ($model->validate()){
                    if ($model->save()){
                        return $this->redirect(['view', 'group_id' => $model->group_id]);
                    }else{
                        var_dump($model->errors);die();
                    }
                }
            }
        } else {
//            var_dump($model->errors);die();
            $model->loadDefaultValues();
        }

        return $this->render('create', [
            'model' => $model,
            'teacher_id'=>$teacher_id,
        ]);
    }

    /**
     * Updates an existing Group model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param int $group_id Group ID
     * @return string|\yii\web\Response
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionUpdate($group_id)
    {
        $model = $this->findModel($group_id);
        $teacher_id = ArrayHelper::map(User::find()->andWhere(['status'=>10,'role'=>2])->all(), 'user_id', 'username');
        $this->layout = 'admin';

        if ($this->request->isPost && $model->load($this->request->post())) {
            $model->updated_by = Yii::$app->user->identity->username;
            $model->lesson_days = implode(",",$model->lesson_days);
            if ($model->save()){
                return $this->redirect(['view', 'group_id' => $model->group_id]);
            }else{
                var_dump($model);die();
            }
        }else{
            $model->lesson_days= explode(',', $model->lesson_days);
        }

        return $this->render('update', [
            'model' => $model,
            'teacher_id'=>$teacher_id,
        ]);
    }


    /**
     * Deletes an existing Group model.
     * If deletion is successful, the browser will be redirected to the 'index' page.
     * @param int $group_id Group ID
     * @return \yii\web\Response
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionDelete($group_id)
    {
        $this->findModel($group_id)->delete();
        $this->layout = 'admin';
        return $this->redirect(['index']);
    }

    /**
     * Finds the Group model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param int $group_id Group ID
     * @return Group the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($group_id)
    {
        if (($model = Group::findOne(['group_id' => $group_id])) !== null) {
            return $model;
        }

        throw new NotFoundHttpException(Yii::t('app', 'The requested page does not exist.'));
    }
}
