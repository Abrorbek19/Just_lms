<?php

use common\models\Video;
use yii\helpers\Html;
use yii\helpers\Url;
use yii\grid\ActionColumn;
use yii\grid\GridView;

/** @var yii\web\View $this */
/** @var common\models\VideoSearch $searchModel */
/** @var yii\data\ActiveDataProvider $dataProvider */

$this->title = Yii::t('app', 'Videos');
//$this->params['breadcrumbs'][] = $this->title;
?>
<div class="page-wrapper mt-3">

    <h1><?= Html::encode($this->title) ?></h1>

    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

//            'video_id',
            'group_id',
            'video_title',
            'video_upload',
            'status',
            //'created_at',
            'created_by',
            //'updated_at',
            'updated_by',
//            [
//                'class' => ActionColumn::className(),
//                'urlCreator' => function ($action, Video $model, $key, $index, $column) {
//                    return Url::toRoute([$action, 'video_id' => $model->video_id]);
//                 }
//            ],
        ],
    ]); ?>


</div>
