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
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="library-index">

    <h1><?= Html::encode($this->title) ?></h1>
    <h1>
        <a href="<?=Url::to(['teacher/index'])?>" class="btn btn-danger">
            BACK
        </a>
    </h1>
   <div class="row">
           <p class="col-2">
               <?= Html::a(Yii::t('app', 'Create Library'), ['create'], ['class' => 'btn btn-success']) ?>
           </p>
           <p class="col-5">
               <a href="<?=Url::to(['week/index'])?>" class="btn btn-success"  style="float:right;">
                   Week Category
               </a>
           </p>
       <p class="col-5">
           <a href="<?=Url::to(['video-audio-file/index'])?>" class="btn btn-success"  style="float:right;">
               Video-Audio-File
           </a>
       </p>
   </div>

    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            'library_id',
            'library_category',
            'status',
            'created_at',
            'created_by',
            //'updated_at',
            //'updated_by',
            [
                'class' => ActionColumn::className(),
                'urlCreator' => function ($action, Library $model, $key, $index, $column) {
                    return Url::toRoute([$action, 'library_id' => $model->library_id]);
                 }
            ],
        ],
    ]); ?>


</div>
