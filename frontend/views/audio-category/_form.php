<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/** @var yii\web\View $this */
/** @var common\models\AudioCategory $model */
/** @var yii\widgets\ActiveForm $form */
?>

<div class="audio-category-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'group_id')->dropDownList($group_id,  ['prompt' => '--Tanlang--']) ?>

    <?= $form->field($model, 'audio_cate_name')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'status')->dropDownList([Yii::$app->params['status']]) ?>
    <div class="form-group">
        <?= Html::submitButton(Yii::t('app', 'Save'), ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
