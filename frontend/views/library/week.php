<?php

use yii\helpers\Html;
use yii\helpers\Url;
use yii\grid\ActionColumn;
use yii\grid\GridView;

/** @var yii\web\View $this */
/** @var common\models\LibrarySearch $searchModel */
/** @var yii\data\ActiveDataProvider $dataProvider */

$this->title = Yii::t('app', 'Weeks');
//$this->params['breadcrumbs'][] = $this->title;
?>
<div class="library-week mt-5">

    <div class="book-top">
        <a href="<?=Url::to(['library/index'])?>" class="back">
            BACK
        </a>
        <div class="book-display">
            <h1 style="padding-right:12px;">
                <?= Html::encode($this->title) ?>
            </h1>
        </div>
        <div></div>
    </div>
    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <div class="row">
        <?php foreach ($week as $week):?>
            <div class="col-xxl-12 col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
                <a href="<?=Url::to(['library/video-audio-file', 'n'=>$week->library_category, 'week'=>$week->week_id])?>" class="text-decoration-none" style="color:black;">
                    <div class="card mt-5">
                        <div class="card-body text-center">
                            <h5>
                                <?= $week->week_category ?>
                            </h5>
                        </div>
                    </div>
                </a>
            </div>
        <?php endforeach;?>
    </div>

</div>
