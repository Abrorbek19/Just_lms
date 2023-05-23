<?php

use common\models\Books;
use yii\helpers\Html;
use yii\helpers\Url;
use yii\grid\ActionColumn;
use yii\grid\GridView;

/** @var yii\web\View $this */
/** @var common\models\BooksSearch $searchModel */
/** @var yii\data\ActiveDataProvider $dataProvider */

$this->title = Yii::t('app', 'Books');
//$this->params['breadcrumbs'][] = $this->title;
?>
<div class="books-index" style="margin-top: 80px">

    <div class="book-top">
            <a href="<?=Url::to(['student/index'])?>" class="back">
                BACK
            </a>
        <div class="book-display">
            <h1 style="padding-right:12px;">
                <?= Html::encode($this->title) ?>
            </h1>
            <img src="../admin/assets/img/card/books.svg" width="61px" height="50px" alt="">
        </div>
        <div></div>
    </div>

    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

<div class="row">
    <?php foreach ($book as $b):?>
    <div class="col-xxl-3 col-xl-4 col-lg-4 col-md-6 col-sm-12 col-12">
        <div class="card pb-3" style="padding:0;">
            <div class="book-display">
                <img src="../admin/assets/img/card/books-logo.svg" style="padding: 8px 14px;" alt="">
                <p class="book-right">
                    Book
                </p>
            </div>
            <div>
                <img src="/Just/just/frontend/web/upload/books/image/<?=$b->books_image?>" style="width:90%;margin-left: 5%;" alt="">
            </div>
            <div class="text-center">
                <h3>
                    <?=$b->books_name?>
                </h3>
                <a href="" class="book-download">
                    Download
                </a>
            </div>
        </div>
    </div>
    <?php endforeach;?>
</div>

    <div class="row">
        <?php foreach ($aud_cat as $cat):?>
        <div class="col-xxl-4 col-xl-6 col-lg-6 col-md-6 col-sm-12 col-12">
            <div class="book-audio">
                    <p class="unit-p">
                        <?=$cat->audio_cate_name?>
                    </p>
                    <p class="audio-top">
                        Audio
                    </p>
                <?//php var_dump($audio);?>
                <?php foreach ($cat->audio as $a):?>
                    <p class="unit-p" style="margin-bottom:16px;">
                        <?=$a->audio_title?>
                    </p>
                    <div>
                        <audio  controls>
                            <source src="/Just/just/frontend/web/upload/audio/<?=$a->audio_voice?>" type="audio/mpeg">
                        </audio>
                    </div>
                <?php endforeach;?>
            </div>
        </div>
        <?php endforeach;?>
    </div>

</div>
