<?php

use yii\helpers\Html;

/** @var yii\web\View $this */
/** @var common\models\Audio $model */

$this->title = Yii::t('app', 'Update Audio: {name}', [
    'name' => $model->audio_id,
]);
$this->params['breadcrumbs'][] = ['label' => Yii::t('app', 'Audios'), 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->audio_id, 'url' => ['view', 'audio_id' => $model->audio_id]];
$this->params['breadcrumbs'][] = Yii::t('app', 'Update');
?>
<div class="audio-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'group_id'=>$group_id,
        'audio_cate'=>$audio_cate,
        'model' => $model,
    ]) ?>

</div>
