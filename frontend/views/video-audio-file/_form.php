<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/** @var yii\web\View $this */
/** @var common\models\VideoAudioFile $model */
/** @var yii\widgets\ActiveForm $form */
?>

<div class="video-audio-file-form">

    <?php $form = ActiveForm::begin(['options'=>['enctype'=>'multipart/form-data']]); ?>

    <?= $form->field($model, 'library_category')->dropDownList($library,  ['prompt' => '--Tanlang--']) ?>

    <?= $form->field($model, 'week_category')->dropDownList($week,  ['prompt' => '--Tanlang--']) ?>

    <?= $form->field($model, 'audio_title')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'audio_voice')->fileInput() ?>

    <?= $form->field($model, 'video_title')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'video')->fileInput() ?>

    <?= $form->field($model, 'file_title')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'image')->fileInput() ?>

    <?= $form->field($model, 'file_upload')->fileInput() ?>

    <?= $form->field($model, 'status')->dropDownList([Yii::$app->params['status']]) ?>

    <div class="form-group">
        <?= Html::submitButton(Yii::t('app', 'Save'), ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
