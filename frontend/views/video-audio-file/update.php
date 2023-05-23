<?php

use yii\helpers\Html;

/** @var yii\web\View $this */
/** @var common\models\VideoAudioFile $model */

$this->title = Yii::t('app', 'Update Video Audio File: {name}', [
    'name' => $model->video_audio_file_id,
]);
$this->params['breadcrumbs'][] = ['label' => Yii::t('app', 'Video Audio Files'), 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->video_audio_file_id, 'url' => ['view', 'video_audio_file_id' => $model->video_audio_file_id]];
$this->params['breadcrumbs'][] = Yii::t('app', 'Update');
?>
<div class="video-audio-file-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'library'=>$library,
        'week'=>$week,
        'model' => $model,
    ]) ?>

</div>
