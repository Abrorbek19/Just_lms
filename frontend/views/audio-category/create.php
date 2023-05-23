<?php

use yii\helpers\Html;

/** @var yii\web\View $this */
/** @var common\models\AudioCategory $model */

$this->title = Yii::t('app', 'Create Audio Category');
$this->params['breadcrumbs'][] = ['label' => Yii::t('app', 'Audio Categories'), 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="audio-category-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'group_id'=>$group_id,
        'model' => $model,
    ]) ?>

</div>
