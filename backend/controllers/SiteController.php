<?php

namespace backend\controllers;

use common\models\Admin;
use common\models\LoginForm;
use common\models\Student;
use common\models\User;
use Yii;
use yii\filters\VerbFilter;
use yii\filters\AccessControl;
use yii\web\Controller;
use yii\web\Response;

/**
 * Site controller
 */
class SiteController extends Controller
{
    /**
     * {@inheritdoc}
     */
    public function behaviors()
    {
        return [
            'access' => [
                'class' => AccessControl::class,
                'rules' => [
                    [
                        'actions' => ['login', 'error'],
                        'allow' => true,
                    ],
                    [
                        'actions' => ['logout', 'index'],
                        'allow' => true,
                        'roles' => ['@'],
                    ],
                ],
            ],
            'verbs' => [
                'class' => VerbFilter::class,
                'actions' => [
                    'logout' => ['post'],
                ],
            ],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function actions()
    {
        $this->layout = 'admin';
        return [
            'error' => [
                'class' => \yii\web\ErrorAction::class,
            ],
        ];
    }

    /**
     * Displays homepage.
     *
     * @return string
     */
    public function actionIndex()
    {
        $this->layout='admin';
        return $this->render('index');
    }

    /**
     * Login action.
     *
     * @return string|Response
     */
    public function actionLogin()
    {
        if (!Yii::$app->user->isGuest) {
            return $this->goHome();
        }

        $this->layout = 'blank';

        $model = new LoginForm();
//        if ($model->load(Yii::$app->request->post()) && $model->login()) {
//            return $this->goBack();
//        }

        if ($model->load(Yii::$app->request->post()) && $model->validate()) {
            $user = User::findByUsername($model->username);
            if ($user){
                $student = Admin::findOne(['user_id'=>$user->user_id]);
                if ($student !== null){
                    if ($user->user_id == $student->user_id){
                        $model->login();
                        return $this->goBack();
                    }else{
                        var_dump($model->errors);die();
                    }
                }else{
//                $error = Yii::$app->session->setFlash('error', 'Username or password incorrect.');
                    echo 'die';
//                return $this->refresh();
//                return var_dump(Teacher::findOne($teacher->user_id)); die();
                }
            }else{
                echo 'no';
            }
        }

        $model->password = '';

        return $this->render('login', [
            'model' => $model,
        ]);
    }

    /**
     * Logout action.
     *
     * @return Response
     */
    public function actionLogout()
    {
        Yii::$app->user->logout();

        return $this->goHome();
    }
}
