<?php

use common\models\Week;
use yii\helpers\Html;
use yii\helpers\Url;
use yii\grid\ActionColumn;
use yii\grid\GridView;

/** @var yii\web\View $this */
/** @var common\models\WeekSearch $searchModel */
/** @var yii\data\ActiveDataProvider $dataProvider */

$this->title = Yii::t('app', 'Weeks');
//$this->params['breadcrumbs'][] = $this->title;
?>
<div class="page-wrapper mt-3">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a(Yii::t('app', 'Create Week'), ['create'], ['class' => 'btn btn-success']) ?>
    </p>

    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

//            'week_id',
            'library_category',
            'week_category',
            'status',
            'created_at',
            'created_by',
            //'updated_at',
            'updated_by',
//            [
//                'class' => ActionColumn::className(),
//                'urlCreator' => function ($action, Week $model, $key, $index, $column) {
//                    return Url::toRoute([$action, 'week_id' => $model->week_id]);
//                 }
//            ],
        ],
    ]); ?>


</div>
