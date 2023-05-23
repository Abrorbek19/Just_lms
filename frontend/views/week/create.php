<?php

use yii\helpers\Html;

/** @var yii\web\View $this */
/** @var common\models\Week $model */

$this->title = Yii::t('app', 'Create Week');
$this->params['breadcrumbs'][] = ['label' => Yii::t('app', 'Weeks'), 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="week-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'library'=>$library,
        'model' => $model,
    ]) ?>

</div>
