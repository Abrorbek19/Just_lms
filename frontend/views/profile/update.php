<?php

use yii\helpers\Html;

/** @var yii\web\View $this */
/** @var common\models\Profile $model */

$this->title = Yii::t('app', 'Update Profile: {name}', [
    'name' => $model->profile_id,
]);
$this->params['breadcrumbs'][] = ['label' => Yii::t('app', 'Profiles'), 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->profile_id, 'url' => ['view', 'profile_id' => $model->profile_id]];
$this->params['breadcrumbs'][] = Yii::t('app', 'Update');
?>
<div class="profile-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
