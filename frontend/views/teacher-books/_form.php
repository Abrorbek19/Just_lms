<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/** @var yii\web\View $this */
/** @var common\models\Books $model */
/** @var yii\widgets\ActiveForm $form */
?>

<div class="books-form">

    <?php $form = ActiveForm::begin(['options'=>['enctype'=>'multipart/form-data']]); ?>

    <?= $form->field($model, 'group_id')->dropDownList($group_id,  ['prompt' => '--Tanlang--'])  ?>

    <?= $form->field($model, 'books_name')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'books_image')->fileInput() ?>

    <?= $form->field($model, 'books_upload')->fileInput() ?>

    <?= $form->field($model, 'status')->dropDownList([Yii::$app->params['status']]) ?>

    <div class="form-group">
        <?= Html::submitButton(Yii::t('app', 'Save'), ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
