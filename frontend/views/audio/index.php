<?php

use common\models\Audio;
use yii\helpers\Html;
use yii\helpers\Url;
use yii\grid\ActionColumn;
use yii\grid\GridView;

/** @var yii\web\View $this */
/** @var common\models\AudioSearch $searchModel */
/** @var yii\data\ActiveDataProvider $dataProvider */

$this->title = Yii::t('app', 'Audios');
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="audio-index">

    <h1><?= Html::encode($this->title) ?></h1>
    <h1>
        <a href="<?=Url::to(['audio-category/index'])?>" class="btn btn-danger">
            BACK
        </a>
    </h1>
    <p>
        <?= Html::a(Yii::t('app', 'Create Audio'), ['create'], ['class' => 'btn btn-success']) ?>
    </p>

    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            'audio_id',
            'group_id',
            'audio_cate_id',
            'audio_title',
            'audio_voice',
            //'status',
            //'created_at',
            //'created_by',
            //'updated_at',
            //'updated_by',
            [
                'class' => ActionColumn::className(),
                'urlCreator' => function ($action, Audio $model, $key, $index, $column) {
                    return Url::toRoute([$action, 'audio_id' => $model->audio_id]);
                 }
            ],
        ],
    ]); ?>


</div>
