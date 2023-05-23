<?php

use common\models\Event;
use yii\bootstrap5\Modal;
use yii\helpers\Html;
use yii\helpers\Url;
use yii\grid\ActionColumn;
use yii\grid\GridView;

/** @var yii\web\View $this */
/** @var common\models\EventSearch $searchModel */
/** @var yii\data\ActiveDataProvider $dataProvider */

$this->title = Yii::t('app', 'Events');
//$this->params['breadcrumbs'][] = $this->title;

?>
<div class="page-wrapper mt-3">

    <a href="<?=Url::home()?>" class="btn btn-danger">
        BACK
    </a>

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a(Yii::t('app', 'Create Event'), ['create'], ['class' => 'btn btn-success']) ?>
    </p>

    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <?=
    \yii2fullcalendar\yii2fullcalendar::widget(array(
        'events'=> $events,
        'id' => 'event_id',
    ));
    ?>
    <h1>Eventlar to'plami</h1>
    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            'event_id',
            'event_name',
            'event_description',
            'event_date',
            'status',
            //'created_at',
            //'created_by',
            //'updated_at',
            //'updated_by',
            [
                'class' => ActionColumn::className(),
                'urlCreator' => function ($action, Event $model, $key, $index, $column) {
                    return Url::toRoute([$action, 'event_id' => $model->event_id]);
                }
            ],
        ],
    ]); ?>
</div>
