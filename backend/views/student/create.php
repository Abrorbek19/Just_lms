<?php

use yii\helpers\Html;

/** @var yii\web\View $this */
/** @var common\models\Student $model */

$this->title = Yii::t('app', 'Create Student');
$this->params['breadcrumbs'][] = ['label' => Yii::t('app', 'Students'), 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
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
