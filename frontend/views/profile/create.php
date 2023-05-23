<?php

use yii\helpers\Html;
use yii\helpers\Url;

/** @var yii\web\View $this */
/** @var common\models\Profile $model */

$this->title = Yii::t('app', 'Create Profile');
//$this->params['breadcrumbs'][] = ['label' => Yii::t('app', 'Profiles'), 'url' => ['index']];
//$this->params['breadcrumbs'][] = $this->title;
?>

<div class="profile-create" style="margin-top:90px;" >

    <h1>
        <?= Html::encode($this->title) ?>
    </h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
