<?php

use yii\helpers\Html;

/** @var yii\web\View $this */
/** @var common\models\Books $model */

$this->title = Yii::t('app', 'Update Books: {name}', [
    'name' => $model->books_id,
]);
$this->params['breadcrumbs'][] = ['label' => Yii::t('app', 'Books'), 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->books_id, 'url' => ['view', 'books_id' => $model->books_id]];
$this->params['breadcrumbs'][] = Yii::t('app', 'Update');
?>
<div class="books-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'group_id'=>$group_id,
        'model' => $model,
    ]) ?>

</div>
