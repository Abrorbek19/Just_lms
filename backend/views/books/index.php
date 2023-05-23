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
<div class="page-wrapper mt-3">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a(Yii::t('app', 'Create Books'), ['create'], ['class' => 'btn btn-success']) ?>
    </p>

    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

//            'books_id',
            'group_id',
            'books_name',
            'books_image',
            'books_upload',
            'status',
            //'created_at',
            'created_by',
            //'updated_at',
            'updated_by',
//            [
//                'class' => ActionColumn::className(),
//                'urlCreator' => function ($action, Books $model, $key, $index, $column) {
//                    return Url::toRoute([$action, 'books_id' => $model->books_id]);
//                 }
//            ],
        ],
    ]); ?>


</div>
