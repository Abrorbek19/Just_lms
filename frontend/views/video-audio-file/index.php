<?php

use common\models\VideoAudioFile;
use yii\helpers\Html;
use yii\helpers\Url;
use yii\grid\ActionColumn;
use yii\grid\GridView;

/** @var yii\web\View $this */
/** @var common\models\VideoAudioFileSearch $searchModel */
/** @var yii\data\ActiveDataProvider $dataProvider */

$this->title = Yii::t('app', 'Video Audio Files');
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="video-audio-file-index">

    <h1><?= Html::encode($this->title) ?></h1>
    <h1>
        <a href="<?=Url::to(['library/index'])?>" class="btn btn-danger">
            BACK
        </a>
    </h1>
    <p>
        <?= Html::a(Yii::t('app', 'Create Video Audio File'), ['create'], ['class' => 'btn btn-success']) ?>
    </p>

    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            'video_audio_file_id',
            'library_category',
            'week_category',
            'audio_title',
            'audio_voice',
            'video_title',
            'video',
            'file_title',
            'image',
            'file_upload',
            //'status',
            //'created_at',
            //'created_by',
            //'updated_at',
            //'updated_by',
            [
                'class' => ActionColumn::className(),
                'urlCreator' => function ($action, VideoAudioFile $model, $key, $index, $column) {
                    return Url::toRoute([$action, 'video_audio_file_id' => $model->video_audio_file_id]);
                 }
            ],
        ],
    ]); ?>


</div>
