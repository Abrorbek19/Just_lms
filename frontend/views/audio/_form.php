<?php

use kartik\depdrop\DepDrop;
use yii\helpers\Html;
use yii\helpers\Url;
use yii\widgets\ActiveForm;

/** @var yii\web\View $this */
/** @var common\models\Audio $model */
/** @var yii\widgets\ActiveForm $form */

?>

<div class="audio-form">

    <?php $form = ActiveForm::begin(['options'=>['enctype'=>'multipart/form-data']]); ?>

    <?php // $model->$group_id = \common\models\AudioCategory::find()->where(['audio_cate_id'=>$model->audio_cate_id])->one()->group_id;?>

    <?php echo $form->field($model, 'group_id')->dropDownList($group_id,  ['prompt' => '--Tanlang--','id' => 'group-id',]) ?>

    <?php //echo $form->field($model, 'audio_cate_id')->dropDownList($audio_cate,  ['prompt' => '--Tanlang--']) ?>

    <?php echo $form->field($model, 'audio_cate_id')->widget(DepDrop::classname(), [
        'type' => DepDrop::TYPE_SELECT2,
        'options' => ['id' => 'audio-cate-id', 'prompt' => '-- Kategoriyani tanlang --'],
        'pluginOptions' => [
            'initialize' => true,
            'depends' => ['group-id'], // Guruh inputiga bog'liq
            'placeholder' => 'Kategoriya tanlang...',
            'url' => Url::to(['/audio/sub']), // GET so'rovni yuborish URL-i
        ],
    ]);
    ?>

    <?= $form->field($model, 'audio_title')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'audio_voice')->fileInput()->input('file',['placeholder'=>"Choose Profile Image"]) ?>

    <?= $form->field($model, 'status')->dropDownList([Yii::$app->params['status']]) ?>

    <div class="form-group">
        <?= Html::submitButton(Yii::t('app', 'Save'), ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
