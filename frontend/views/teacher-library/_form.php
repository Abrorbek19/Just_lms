<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/** @var yii\web\View $this */
/** @var common\models\Library $model */
/** @var yii\widgets\ActiveForm $form */
?>

<div class="library-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'library_category')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'status')->dropDownList([Yii::$app->params['status']]) ?>

    <div class="form-group">
        <?= Html::submitButton(Yii::t('app', 'Save'), ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
