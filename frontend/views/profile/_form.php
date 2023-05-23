<?php

use yii\helpers\Html;
use yii\helpers\Url;
use yii\widgets\ActiveForm;

/** @var yii\web\View $this */
/** @var common\models\Profile $model */
/** @var yii\widgets\ActiveForm $form */
?>
<div class="profile-form">

    <?php $form = ActiveForm::begin(['options'=>['enctype'=>'multipart/form-data']]); ?>

 <div class="row">
     <div class="col-12">
<div class="row">
    <div class="col-6">
        <?= $form->field($model, 'full_name')->textInput(['maxlength' => true])->input('text',['placeholder' => "Abrorbek Toshpolatov"]) ?>
    </div>
    <div class="col-6">
        <?= $form->field($model, 'description')->textInput(['maxlength' => true])->input('text',['placeholder' => "Bio"]) ?>
    </div>
    <div class="col-4">
        <?= $form->field($model, 'address')->textInput(['maxlength' => true])->input('text',['placeholder' => "Toshkent, Uzbekistan"]) ?>
    </div>
    <div class="col-4">
        <?= $form->field($model, 'email')->textInput(['maxlength' => true])->input('text',['placeholder' => "example@gmail.com"]) ?>
    </div>
    <div class="col-4">
        <?= $form->field($model, 'phone')->textInput(['maxlength' => true])->input('text',['placeholder' => "+998XX-XXX-XX-XX"]) ?>
    </div>
    <div class="col-3">
        <?= $form->field($model, 'date_of_birth')->textInput(['maxlength' => true])->input('date') ?>
    </div>
    <div class="col-3">
        <?= $form->field($model, 'image')->fileInput()->input('file',['placeholder'=>"Choose Profile Image"]) ?>
    </div>
</div>
     </div>
 </div>
    <div class="form-group">
        <?= Html::submitButton(Yii::t('app', 'Save'), ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
