<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/** @var yii\web\View $this */
/** @var common\models\VideoAudioFile $model */

$this->title = $model->video_audio_file_id;
$this->params['breadcrumbs'][] = ['label' => Yii::t('app', 'Video Audio Files'), 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
\yii\web\YiiAsset::register($this);
?>
<div class="video-audio-file-view">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a(Yii::t('app', 'Update'), ['update', 'video_audio_file_id' => $model->video_audio_file_id], ['class' => 'btn btn-primary']) ?>
        <?= Html::a(Yii::t('app', 'Delete'), ['delete', 'video_audio_file_id' => $model->video_audio_file_id], [
            'class' => 'btn btn-danger',
            'data' => [
                'confirm' => Yii::t('app', 'Are you sure you want to delete this item?'),
                'method' => 'post',
            ],
        ]) ?>
    </p>

    <?= DetailView::widget([
        'model' => $model,
        'attributes' => [
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
            'status',
            'created_at',
            'created_by',
            'updated_at',
            'updated_by',
        ],
    ]) ?>

</div>
