<?php

use yii\helpers\Html;

/** @var yii\web\View $this */
/** @var common\models\Library $model */

$this->title = Yii::t('app', 'Create Library');
$this->params['breadcrumbs'][] = ['label' => Yii::t('app', 'Libraries'), 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="library-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
