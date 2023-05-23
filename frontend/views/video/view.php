<?php

use yii\helpers\Html;
use yii\helpers\Url;
use yii\widgets\DetailView;

/** @var yii\web\View $this */
/** @var common\models\Video $model */

$this->title = $model->video_title;
//$this->params['breadcrumbs'][] = ['label' => Yii::t('app', 'Videos'), 'url' => ['index']];
//$this->params['breadcrumbs'][] = $this->title;
//\yii\web\YiiAsset::register($this);
?>
<div class="video-view mt-5">

    <div class="book-top">
        <a href="<?=Url::to(['video/index'])?>" class="back">
            BACK
        </a>
        <div class="book-display">
            <h1 style="padding-right:12px;">
                <?= Html::encode($this->title) ?>
            </h1>
            <img src="../admin/assets/img/card/vid.svg" width="61px" height="50px" alt="">
        </div>
        <div></div>
    </div>

    <video controls width="100%" height="100%" controlsList="nodownload">
        <source src="/Just/just/frontend/web/upload/video/<?=$model->video_upload?>" type="video/mp4">
    </video>
</div>
