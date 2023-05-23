<?php

use yii\helpers\Html;

/** @var yii\web\View $this */
/** @var common\models\Event $model */

$this->title = Yii::t('app', 'Update Event: {name}', [
    'name' => $model->event_id,
]);
$this->params['breadcrumbs'][] = ['label' => Yii::t('app', 'Events'), 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->event_id, 'url' => ['view', 'event_id' => $model->event_id]];
$this->params['breadcrumbs'][] = Yii::t('app', 'Update');
?>
<div class="page-wrapper">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
