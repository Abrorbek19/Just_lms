<?php

use common\models\Homework;
use yii\helpers\Html;
use yii\helpers\Url;
use yii\grid\ActionColumn;
use yii\grid\GridView;

/** @var yii\web\View $this */
/** @var common\models\HomeworkSearch $searchModel */
/** @var yii\data\ActiveDataProvider $dataProvider */

$this->title = Yii::t('app', 'Homeworks');
//$this->params['breadcrumbs'][] = $this->title;
?>
<div class="page-wrapper mt-3">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a(Yii::t('app', 'Create Homework'), ['create'], ['class' => 'btn btn-success']) ?>
    </p>

    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

//            'homework_id',
            'group_id',
            'homework_title',
            'homework_date',
            'status',
            //'created_at',
            'created_by',
            //'updated_at',
            'updated_by',
//            [
//                'class' => ActionColumn::className(),
//                'urlCreator' => function ($action, Homework $model, $key, $index, $column) {
//                    return Url::toRoute([$action, 'homework_id' => $model->homework_id]);
//                 }
//            ],
        ],
    ]); ?>


</div>
