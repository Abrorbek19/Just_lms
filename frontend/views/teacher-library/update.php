<?php

use yii\helpers\Html;

/** @var yii\web\View $this */
/** @var common\models\Library $model */

$this->title = Yii::t('app', 'Update Library: {name}', [
    'name' => $model->library_id,
]);
$this->params['breadcrumbs'][] = ['label' => Yii::t('app', 'Libraries'), 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->library_id, 'url' => ['view', 'library_id' => $model->library_id]];
$this->params['breadcrumbs'][] = Yii::t('app', 'Update');
?>
<div class="library-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
