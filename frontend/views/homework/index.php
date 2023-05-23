<?php

use common\models\Homework;
use common\models\Student;
use yii\helpers\Html;
use yii\helpers\Url;
use yii\grid\ActionColumn;
use yii\grid\GridView;

/** @var yii\web\View $this */
/** @var common\models\HomeworkSearch $searchModel */
/** @var yii\data\ActiveDataProvider $dataProvider */

$this->title = Yii::t('app', 'Homeworks');
//$this->params['breadcrumbs'][] = $this->title;

?>
<div class="homework-index" style="margin-top:80px;">

    <div class="book-top">
        <a href="<?=Url::to(['student/index'])?>" class="back">
            BACK
        </a>
        <div class="book-display">
            <h1 style="padding-right:12px;">
                <?= Html::encode($this->title) ?>
            </h1>
            <img src="../admin/assets/img/card/hw.svg" width="61px" height="50px" alt="">
        </div>
        <div></div>
    </div>


    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <?php foreach ($homework as $home):?>
    <div class="card b-left mt-5">
        <div class="card-body">
            <div class="row">
                <div class="col-9">
                    <?= $home->homework_title ?>
                </div>
                <div class="col-3 aylana">
                    <?php $date = $home->homework_date;
                    $formattedDate = Yii::$app->formatter->asDate($date, 'php:d M');
                    echo $formattedDate;
                    ?>
                </div>
            </div>
        </div>
    </div>
    <?php endforeach;?>
</div>
