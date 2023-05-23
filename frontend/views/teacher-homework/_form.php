<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/** @var yii\web\View $this */
/** @var common\models\Homework $model */
/** @var yii\widgets\ActiveForm $form */
?>

<div class="homework-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'group_id')->dropDownList($group_id,  ['prompt' => '--Tanlang--']) ?>

    <?= $form->field($model, 'homework_title')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'homework_date',['inputOptions' => ['type'=>'date']])->textInput() ?>

    <?= $form->field($model, 'status')->dropDownList([Yii::$app->params['status']]) ?>

    <div class="form-group">
        <?= Html::submitButton(Yii::t('app', 'Save'), ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
