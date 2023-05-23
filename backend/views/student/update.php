<?php

use yii\helpers\Html;

/** @var yii\web\View $this */
/** @var common\models\Student $model */

$this->title = Yii::t('app', 'Update Student: {name}', [
    'name' => $model->student_id,
]);
$this->params['breadcrumbs'][] = ['label' => Yii::t('app', 'Students'), 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->student_id, 'url' => ['view', 'student_id' => $model->student_id]];
$this->params['breadcrumbs'][] = Yii::t('app', 'Update');
?>
<div class="page-wrapper">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
        'user_id'=>$user_id,
        'user_role'=>$user_role,
        'group_id'=>$group_id,
    ]) ?>

</div>
