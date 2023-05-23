<?php

use yii\helpers\Html;

/** @var yii\web\View $this */
/** @var common\models\Video $model */

$this->title = Yii::t('app', 'Update Video: {name}', [
    'name' => $model->video_id,
]);
$this->params['breadcrumbs'][] = ['label' => Yii::t('app', 'Videos'), 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->video_id, 'url' => ['view', 'video_id' => $model->video_id]];
$this->params['breadcrumbs'][] = Yii::t('app', 'Update');
?>
<div class="video-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'group_id'=>$group_id,
        'model' => $model,
    ]) ?>

</div>
