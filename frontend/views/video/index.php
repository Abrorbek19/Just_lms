<?php

use common\models\Video;
use yii\helpers\Html;
use yii\helpers\Url;
use yii\grid\ActionColumn;
use yii\grid\GridView;

/** @var yii\web\View $this */
/** @var common\models\VideoSearch $searchModel */
/** @var yii\data\ActiveDataProvider $dataProvider */

$this->title = Yii::t('app', 'Videos');
//$this->params['breadcrumbs'][] = $this->title;

?>
<div class="video-index mt-5">

    <div class="book-top">
        <a href="<?=Url::to(['student/index'])?>" class="back">
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

    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

      <div class="row">
          <?php foreach ($video as $v):?>
        <div class="col-xxl-2 col-xl-3 col-lg-4 col-md-6 col-sm-6 col-6">
            <div class="video-card">
                <p class="book-right-top">
                    Video
                </p>
                <p class="unit-p">
                    <?=$v->video_title?>
                </p>
                <a href="<?=Url::to(['video/view','video_id'=>$v->video_id])?>" class="video-watch">
                    Watch
                </a>
            </div>
        </div>
          <?php endforeach;?>
      </div>

</div>
