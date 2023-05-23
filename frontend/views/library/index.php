<?php

use common\models\Library;
use yii\helpers\Html;
use yii\helpers\Url;
use yii\grid\ActionColumn;
use yii\grid\GridView;

/** @var yii\web\View $this */
/** @var common\models\LibrarySearch $searchModel */
/** @var yii\data\ActiveDataProvider $dataProvider */

$this->title = Yii::t('app', 'Libraries');
//$this->params['breadcrumbs'][] = $this->title;
?>
<div class="library-index mt-5">

    <div class="book-top">
        <a href="<?=Url::to(['student/index'])?>" class="back">
            BACK
        </a>
        <div class="book-display">
            <h1 style="padding-right:12px;">
                <?= Html::encode($this->title) ?>
            </h1>
            <img src="../admin/assets/img/card/lib.svg" width="61px" height="50px" alt="">
        </div>
        <div></div>
    </div>
    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

 <div class="row">
     <?php foreach ($library as $lib):?>
         <div class="col-xxl-3 col-xl-3 col-lg-4 col-md-6 col-sm-12 col-12">
             <a href="<?=Url::to(['library/week' , 'n'=>$lib->library_id ])?>" class="text-decoration-none" style="color:black;font-size: 4rem;">
                 <div class="card mt-5">
                     <div class="card-body text-center">
                         <?= $lib->library_category ?>
                     </div>
                 </div>
             </a>
         </div>
     <?php endforeach;?>
 </div>

</div>
