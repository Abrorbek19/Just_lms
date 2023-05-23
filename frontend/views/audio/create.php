<?php

use yii\helpers\Html;

/** @var yii\web\View $this */
/** @var common\models\Audio $model */

$this->title = Yii::t('app', 'Create Audio');
$this->params['breadcrumbs'][] = ['label' => Yii::t('app', 'Audios'), 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="audio-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'group_id'=>$group_id,
        'audio_cate'=>$audio_cate,
        'model' => $model,
    ]) ?>

</div>
