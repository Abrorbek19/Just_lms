<?php

use yii\helpers\Html;

/** @var yii\web\View $this */
/** @var common\models\VideoAudioFile $model */

$this->title = Yii::t('app', 'Create Video Audio File');
$this->params['breadcrumbs'][] = ['label' => Yii::t('app', 'Video Audio Files'), 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="video-audio-file-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'library'=>$library,
        'week'=>$week,
        'model' => $model,
    ]) ?>

</div>
