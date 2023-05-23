<?php

use yii\helpers\Html;

/** @var yii\web\View $this */
/** @var common\models\Week $model */

$this->title = Yii::t('app', 'Update Week: {name}', [
    'name' => $model->week_id,
]);
$this->params['breadcrumbs'][] = ['label' => Yii::t('app', 'Weeks'), 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->week_id, 'url' => ['view', 'week_id' => $model->week_id]];
$this->params['breadcrumbs'][] = Yii::t('app', 'Update');
?>
<div class="week-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'library'=>$library,
        'model' => $model,
    ]) ?>

</div>
