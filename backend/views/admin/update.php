<?php

use yii\helpers\Html;

/** @var yii\web\View $this */
/** @var common\models\Admin $model */

$this->title = Yii::t('app', 'Update Admin: {name}', [
    'name' => $model->admin_id,
]);
$this->params['breadcrumbs'][] = ['label' => Yii::t('app', 'Admins'), 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->admin_id, 'url' => ['view', 'admin_id' => $model->admin_id]];
$this->params['breadcrumbs'][] = Yii::t('app', 'Update');
?>
<div class="page-wrapper">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'user_id'=>$user_id,
        'user_role'=>$user_role,
        'model' => $model,
    ]) ?>

</div>
