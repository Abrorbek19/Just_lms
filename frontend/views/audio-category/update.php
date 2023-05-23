<?php

use yii\helpers\Html;

/** @var yii\web\View $this */
/** @var common\models\AudioCategory $model */

$this->title = Yii::t('app', 'Update Audio Category: {name}', [
    'name' => $model->audio_cate_id,
]);
$this->params['breadcrumbs'][] = ['label' => Yii::t('app', 'Audio Categories'), 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->audio_cate_id, 'url' => ['view', 'audio_cate_id' => $model->audio_cate_id]];
$this->params['breadcrumbs'][] = Yii::t('app', 'Update');
?>
<div class="audio-category-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'group_id'=>$group_id,
        'model' => $model,
    ]) ?>

</div>
