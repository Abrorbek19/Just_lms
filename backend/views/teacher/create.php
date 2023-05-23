<?php

use yii\helpers\Html;

/** @var yii\web\View $this */
/** @var common\models\Teacher $model */

$this->title = Yii::t('app', 'Create Teacher');
$this->params['breadcrumbs'][] = ['label' => Yii::t('app', 'Teachers'), 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="page-wrapper">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
        'user_id'=>$user_id,
        'user_role'=>$user_role,
    ]) ?>

</div>
