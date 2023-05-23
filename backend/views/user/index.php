<?php

use common\models\User;
use yii\helpers\Html;
use yii\helpers\Url;
use yii\grid\ActionColumn;
use yii\grid\GridView;

/** @var yii\web\View $this */
/** @var common\models\UserSearch $searchModel */
/** @var yii\data\ActiveDataProvider $dataProvider */

$this->title = Yii::t('app', 'Users');
//$this->params['breadcrumbs'][] = $this->title;
?>
<div class="page-wrapper mt-3">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a(Yii::t('app', 'Create User'), ['create'], ['class' => 'btn btn-success']) ?>
    </p>

    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

//            'user_id',
            'first_name',
            'last_name',
//            'role',
            [
                'attribute' =>'role',
                'filter' => Yii::$app->params['role'],
                'value' => function ($model) {
                    return Yii::$app->params['role'][$model->role];
                }
            ],
            'username',
            //'auth_key',
            //'password',
            //'email:email',
//            'status',
            [
                'attribute' =>'status',
                'filter' => Yii::$app->params['status'],
                'value' => function ($model) {
                    return Yii::$app->params['status'][$model->status];
                }
            ],
            //'created_at',
            //'created_by',
            //'updated_at',
            //'updated_by',
            [
                'class' => ActionColumn::className(),
                'urlCreator' => function ($action, User $model, $key, $index, $column) {
                    return Url::toRoute([$action, 'user_id' => $model->user_id]);
                 }
            ],
        ],
    ]); ?>


</div>
