<?php

use kartik\select2\Select2;
use yii\helpers\Html;
use yii\widgets\ActiveForm;

/** @var yii\web\View $this */
/** @var common\models\Group $model */
/** @var yii\widgets\ActiveForm $form */
?>

<div class="group-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'group_name')->textInput(['maxlength' => true]) ?>

    <?php
        echo '<label class="control-label">Lesson Days</label> <br>';
        echo Select2::widget([
        'model' => $model,
        'class'=>'col-12',
        'name' => 'lesson_days',
        'attribute' => 'lesson_days',
        'data' => Yii::$app->params['days'],  //['1'=>'1','2'=>2],
        'options' => [
            'placeholder' => 'Select Days ...',
            'multiple' => true
        ],
    ]);
    ?>


    <?= $form->field($model, 'lesson_time')->dropDownList([Yii::$app->params['lesson_time']]) ?>

    <?= $form->field($model, 'teacher_id')->dropDownList($teacher_id,  ['prompt' => '--Tanlang--']) ?>

    <?= $form->field($model, 'status')->dropDownList([Yii::$app->params['status']]) ?>

    <div class="form-group">
        <?= Html::submitButton(Yii::t('app', 'Save'), ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>

