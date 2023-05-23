<?php

use common\models\AudioCategory;
use yii\helpers\Html;
use yii\helpers\Url;
use yii\grid\ActionColumn;
use yii\grid\GridView;

/** @var yii\web\View $this */
/** @var common\models\AudioCategorySearch $searchModel */
/** @var yii\data\ActiveDataProvider $dataProvider */

$this->title = Yii::t('app', 'Audio Categories');
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="audio-category-index">

    <h1><?= Html::encode($this->title) ?></h1>
    <h1>
        <a href="<?=Url::to(['teacher/index'])?>" class="btn btn-danger">
            BACK
        </a>
    </h1>

    <div class="row">
        <p class="col-2">
            <?= Html::a(Yii::t('app', 'Create Audio Category'), ['create'], ['class' => 'btn btn-success']) ?>
        </p>
        <p class="col-8">
            <a href="<?=Url::to(['audio/index'])?>" class="btn btn-success " style="float:right">
                Create Audio
            </a>
        </p>
        <div class="col-2"></div>
    </div>

    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            'audio_cate_id',
            'group_id',
            'audio_cate_name',
            'status',
            //'created_at',
            //'created_by',
            //'updated_at',
            //'updated_by',
            [
                'class' => ActionColumn::className(),
                'urlCreator' => function ($action, AudioCategory $model, $key, $index, $column) {
                    return Url::toRoute([$action, 'audio_cate_id' => $model->audio_cate_id]);
                 }
            ],
        ],
    ]); ?>


</div>
