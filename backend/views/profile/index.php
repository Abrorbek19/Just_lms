<?php

use common\models\Profile;
use yii\helpers\Html;
use yii\helpers\Url;
use yii\grid\ActionColumn;
use yii\grid\GridView;

/** @var yii\web\View $this */
/** @var common\models\ProfileSearch $searchModel */
/** @var yii\data\ActiveDataProvider $dataProvider */

$this->title = Yii::t('app', 'Profiles');
//$this->params['breadcrumbs'][] = $this->title;
?>
<div class="page-wrapper mt-3">

    <h1><?= Html::encode($this->title) ?></h1>

    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

//            'profile_id',
            'created_by',
            'full_name',
            'description',
//            'image',
            [
                'attribute'=>'image',
                'format' => 'raw',
                'value'=>function ($model){
                    $image = Html::img("../../frontend/web/upload/image/$model->image",['class'=>'img-fluid']);
                    return $image;
                }
            ],
            'address',
            'email:email',
            'date_of_birth',
            'phone',
            //'status',
            //'created_at',
            //'updated_at',
            //'updated_by',

        ],
    ]); ?>


</div>
