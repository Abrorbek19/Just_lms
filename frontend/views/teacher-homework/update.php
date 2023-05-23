<?php

use yii\helpers\Html;

/** @var yii\web\View $this */
/** @var common\models\Homework $model */

$this->title = Yii::t('app', 'Update Homework: {name}', [
    'name' => $model->homework_id,
]);
$this->params['breadcrumbs'][] = ['label' => Yii::t('app', 'Homeworks'), 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->homework_id, 'url' => ['view', 'homework_id' => $model->homework_id]];
$this->params['breadcrumbs'][] = Yii::t('app', 'Update');
?>
<div class="homework-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'group_id'=>$group_id,
        'model' => $model,
    ]) ?>

</div>
