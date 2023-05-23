<?php

use common\models\Teacher;
use yii\helpers\Html;
use yii\helpers\Url;
use yii\grid\ActionColumn;
use yii\grid\GridView;

/** @var yii\web\View $this */
/** @var common\models\TeacherSearch $searchModel */
/** @var yii\data\ActiveDataProvider $dataProvider */

$this->title = Yii::t('app', 'Teachers');
//$this->params['breadcrumbs'][] = $this->title;
?>
<div class="teacher-index">

    <h1><?php //echo Html::encode($this->title) ?></h1>

    <p>
        <?php //echo Html::a(Yii::t('app', 'Create Teacher'), ['create'], ['class' => 'btn btn-success']) ?>
    </p>

    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <?php //echo GridView::widget([
//        'dataProvider' => $dataProvider,
//        'filterModel' => $searchModel,
//        'columns' => [
//            ['class' => 'yii\grid\SerialColumn'],
//
//            'teacher_id',
//            'user_id',
//            'phone_number',
//            'user_role',
//            'status',
//            //'created_at',
//            //'created_by',
//            //'updated_at',
//            //'updated_by',
//            [
//                'class' => ActionColumn::className(),
//                'urlCreator' => function ($action, Teacher $model, $key, $index, $column) {
//                    return Url::toRoute([$action, 'teacher_id' => $model->teacher_id]);
//                 }
//            ],
//        ],
//    ]); ?>

        <div class="content container-fluid" style="padding-top:85px;">
            <div class="row">
               <div class="karusel pr-nt">
                   <div class="col-xl-3 col-sm-6 col-12 d-flex"style="margin: 0px 20px 0 20px">
                       <div class="card bg-comman w-100">
                           <div class="card-body">
                               <div class="db-widgets d-flex justify-content-between align-items-center">
                                   <div class="db-info">
                                       <h6>Total Classes</h6>
                                       <h3>04/06</h3>
                                   </div>
                                   <div class="db-icon">
                                       <img src="../admin/assets/img/icons/teacher-icon-01.svg" alt="Dashboard Icon">
                                   </div>
                               </div>
                           </div>
                       </div>
                   </div>
                   <div class="col-xl-3 col-sm-6 col-12 d-flex"style="margin: 0px 20px 0 20px">
                       <div class="card bg-comman w-100">
                           <div class="card-body">
                               <div class="db-widgets d-flex justify-content-between align-items-center">
                                   <div class="db-info">
                                       <h6>Total Students</h6>
                                       <h3>40/60</h3>
                                   </div>
                                   <div class="db-icon">
                                       <img src="../admin/assets/img/icons/dash-icon-01.svg" alt="Dashboard Icon">
                                   </div>
                               </div>
                           </div>
                       </div>
                   </div>
                   <div class="col-xl-3 col-sm-6 col-12 d-flex"style="margin: 0px 20px 0 20px">
                       <div class="card bg-comman w-100">
                           <div class="card-body">
                               <div class="db-widgets d-flex justify-content-between align-items-center">
                                   <div class="db-info">
                                       <h6>Total Group</h6>
                                       <h3>
                                           <?php
                                           if (\common\models\Group::find()->where(['teacher_id'=>Yii::$app->user->id])){
                                               $a = \common\models\Group::find()->where(['teacher_id'=>Yii::$app->user->id])->count();
                                               echo $a;
                                           }
                                           ?>
                                       </h3>
                                   </div>
                                   <div class="db-icon">
                                       <img src="../admin/assets/img/icons/teacher-icon-02.svg" alt="Dashboard Icon">
                                   </div>
                               </div>
                           </div>
                       </div>
                   </div>
                   <div class="col-xl-3 col-sm-6 col-12 d-flex"style="margin: 0px 20px 0 20px">
                       <div class="card bg-comman w-100">
                           <div class="card-body">
                               <div class="db-widgets d-flex justify-content-between align-items-center">
                                   <div class="db-info">
                                       <h6>Total Lessons</h6>
                                       <h3>30/50</h3>
                                   </div>
                                   <div class="db-icon">
                                       <img src="../admin/assets/img/icons/teacher-icon-02.svg" alt="Dashboard Icon">
                                   </div>
                               </div>
                           </div>
                       </div>
                   </div>
                   <div class="col-xl-3 col-sm-6 col-12 d-flex"style="margin: 0px 20px 0 20px">
                       <div class="card bg-comman w-100">
                           <div class="card-body">
                               <div class="db-widgets d-flex justify-content-between align-items-center">
                                   <div class="db-info">
                                       <h6>Total Hours</h6>
                                       <h3>15/20</h3>
                                   </div>
                                   <div class="db-icon">
                                       <img src="../admin/assets/img/icons/teacher-icon-03.svg" alt="Dashboard Icon">
                                   </div>
                               </div>
                           </div>
                       </div>
                   </div>
               </div>
            </div>

            <div class="row mt-5">
                <div class="col-12 col-lg-12 col-xl-12 col-xxl-12">
                    <div class="row">
                        <div class="col-xxl-4 col-xl-4 col-lg-6 col-md-12 col-sm-12 col-12">
                            <a href="#" >
                                <div class="column">
                                    <div class="card text-center">
                                        <img src="../admin/assets/img/card/mymark.svg" width="65px" height="63px" style="margin:12px auto;">
                                        <h2>Marks</h2>
                                        <p>text</p>
                                    </div>
                                </div>
                            </a>
                        </div>
                        <div class="col-xxl-4 col-xl-4 col-lg-6 col-md-12 col-sm-12 col-12">
                            <a href="#" >
                                <div class="column">
                                    <div class="card text-center">
                                        <img src="../admin/assets/img/card/exams.svg" width="65px" height="63px" style="margin:12px auto;">
                                        <h2>Exams</h2>
                                        <p>Text</p>
                                    </div>
                                </div>
                            </a>
                        </div>
                        <div class="col-xxl-4 col-xl-4 col-lg-6 col-md-12 col-sm-12 col-12">
                            <a href="<?=Url::to(['teacher-homework/index'])?>" >
                                <div class="column">
                                    <div class="card text-center">
                                        <img src="../admin/assets/img/card/hw.svg" width="65px" height="63px" style="margin:12px auto;">
                                        <h2>Homework</h2>
                                        <p>Text</p>
                                    </div>
                                </div>
                            </a>
                        </div>
                        <div class="col-xxl-4 col-xl-4 col-lg-6 col-md-12 col-sm-12 col-12">
                            <a href="<?=Url::to(['teacher-library/index'])?>" >
                                <div class="column">
                                    <div class="card text-center">
                                        <img src="../admin/assets/img/card/lib.svg" width="65px" height="63px" style="margin:12px auto;">
                                        <h2>Library</h2>
                                        <p>Text</p>
                                    </div>
                                </div>
                            </a>
                        </div>
                        <div class="col-xxl-4 col-xl-4 col-lg-6 col-md-12 col-sm-12 col-12">
                            <a href="<?=Url::to(['teacher-books/index'])?>" >
                                <div class="column">
                                    <div class="card text-center">
                                        <img src="../admin/assets/img/card/books.svg" width="65px" height="63px" style="margin:12px auto;">
                                        <h2>Books</h2>
                                        <p>Text</p>
                                    </div>
                                </div>
                            </a>
                        </div>
                        <div class="col-xxl-4 col-xl-4 col-lg-6 col-md-12 col-sm-12 col-12">
                            <a href="<?=Url::to(['teacher-video/index'])?>">
                                <div class="column">
                                    <div class="card text-center">
                                        <img src="../admin/assets/img/card/vid.svg" width="65px" height="63px" style="margin:12px auto;">
                                        <h2>Videos</h2>
                                        <p>Text</p>
                                    </div>
                                </div>
                            </a>
                        </div>
                    </div>
                </div>
            </div>



            <div class="row">
                <div class="col-12 col-lg-12 col-xl-8">
                    <div class="row">
                        <div class="col-12 col-lg-8 col-xl-8 d-flex">
                            <div class="card flex-fill comman-shadow">
                                <div class="card-header">
                                    <div class="row align-items-center">
                                        <div class="col-6">
                                            <h5 class="card-title">Upcoming Lesson</h5>
                                        </div>
                                        <div class="col-6">
                                            <span class="float-end view-link"><a href="#">View All Courses</a></span>
                                        </div>
                                    </div>
                                </div>
                                <div class="pt-3 pb-3">
                                    <div class="table-responsive lesson">
                                        <table class="table table-center">
                                            <tbody>
                                            <tr>
                                                <td>
                                                    <div class="date">
                                                        <b>Lessons 30</b>
                                                        <p>3.1 Ipsuum dolor</p>
                                                        <ul class="teacher-date-list">
                                                            <li><i class="fas fa-calendar-alt me-2"></i>Sep 5, 2023</li>
                                                            <li>|</li>
                                                            <li><i class="fas fa-clock me-2"></i>09:00 - 10:00 am</li>
                                                        </ul>
                                                    </div>
                                                </td>
                                                <td>
                                                    <div class="lesson-confirm">
                                                        <a href="#">Confirmed</a>
                                                    </div>
                                                    <button type="submit" class="btn btn-info">Reschedule</button>
                                                </td>
                                            </tr>
                                            <tr>
                                                <td>
                                                    <div class="date">
                                                        <b>Lessons 30</b>
                                                        <p>3.1 Ipsuum dolor</p>
                                                        <ul class="teacher-date-list">
                                                            <li><i class="fas fa-calendar-alt me-2"></i>Sep 5, 2023</li>
                                                            <li>|</li>
                                                            <li><i class="fas fa-clock me-2"></i>09:00 - 10:00 am</li>
                                                        </ul>
                                                    </div>
                                                </td>
                                                <td>
                                                    <div class="lesson-confirm">
                                                        <a href="#">Confirmed</a>
                                                    </div>
                                                    <button type="submit" class="btn btn-info">Reschedule</button>
                                                </td>
                                            </tr>
                                            </tbody>
                                        </table>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-12 col-lg-4 col-xl-4 d-flex">
                            <div class="card flex-fill comman-shadow">
                                <div class="card-header">
                                    <div class="row align-items-center">
                                        <div class="col-12">
                                            <h5 class="card-title">Semester Progress</h5>
                                        </div>
                                    </div>
                                </div>
                                <div class="dash-widget">
                                    <div class="circle-bar circle-bar1">
                                        <div class="circle-graph1" data-percent="50">
                                            <div class="progress-less">
                                                <b>55/60</b>
                                                <p>Lesson Progressed</p>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-12 col-lg-12 col-xl-12 d-flex">
                            <div class="card flex-fill comman-shadow">
                                <div class="card-header">
                                    <div class="row align-items-center">
                                        <div class="col-6">
                                            <h5 class="card-title">Teaching Activity</h5>
                                        </div>
                                        <div class="col-6">
                                            <ul class="chart-list-out">
                                                <li><span class="circle-blue"></span>Teacher</li>
                                                <li><span class="circle-green"></span>Students</li>
                                                <li class="star-menus"><a href="javascript:;"><i class="fas fa-ellipsis-v"></i></a></li>
                                            </ul>
                                        </div>
                                    </div>
                                </div>
                                <div class="card-body">
                                    <div id="school-area"></div>
                                </div>
                            </div>
                        </div>
                        <div class="col-12 col-lg-12 col-xl-12 d-flex">
                            <div class="card flex-fill comman-shadow">
                                <div class="card-header d-flex align-items-center">
                                    <h5 class="card-title">Teaching History</h5>
                                    <ul class="chart-list-out student-ellips">
                                        <li class="star-menus"><a href="javascript:;"><i class="fas fa-ellipsis-v"></i></a></li>
                                    </ul>
                                </div>
                                <div class="card-body">
                                    <div class="teaching-card">
                                        <ul class="steps-history">
                                            <li>Sep22</li>
                                            <li>Sep23</li>
                                            <li>Sep24</li>
                                        </ul>
                                        <ul class="activity-feed">
                                            <li class="feed-item d-flex align-items-center">
                                                <div class="dolor-activity">
                                                    <span class="feed-text1"><a>Mathematics</a></span>
                                                    <ul class="teacher-date-list">
                                                        <li><i class="fas fa-calendar-alt me-2"></i>September 5, 2023</li>
                                                        <li>|</li>
                                                        <li><i class="fas fa-clock me-2"></i>09:00 am - 10:00 am (60 Minutes)</li>
                                                    </ul>
                                                </div>
                                                <div class="activity-btns ms-auto">
                                                    <button type="submit" class="btn btn-info">In Progress</button>
                                                </div>
                                            </li>
                                            <li class="feed-item d-flex align-items-center">
                                                <div class="dolor-activity">
                                                    <span class="feed-text1"><a>Geography	</a></span>
                                                    <ul class="teacher-date-list">
                                                        <li><i class="fas fa-calendar-alt me-2"></i>September 5, 2023</li>
                                                        <li>|</li>
                                                        <li><i class="fas fa-clock me-2"></i>09:00 am - 10:00 am (60 Minutes)</li>
                                                    </ul>
                                                </div>
                                                <div class="activity-btns ms-auto">
                                                    <button type="submit" class="btn btn-info">Completed</button>
                                                </div>
                                            </li>
                                            <li class="feed-item d-flex align-items-center">
                                                <div class="dolor-activity">
                                                    <span class="feed-text1"><a>Botony</a></span>
                                                    <ul class="teacher-date-list">
                                                        <li><i class="fas fa-calendar-alt me-2"></i>September 5, 2023</li>
                                                        <li>|</li>
                                                        <li><i class="fas fa-clock me-2"></i>09:00 am - 10:00 am (60 Minutes)</li>
                                                    </ul>
                                                </div>
                                                <div class="activity-btns ms-auto">
                                                    <button type="submit" class="btn btn-info">In Progress</button>
                                                </div>
                                            </li>
                                        </ul>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-12 col-lg-12 col-xl-4 d-flex">
                    <div class="card flex-fill comman-shadow">
                        <div class="card-body">
                            <div id="calendar-doctor" class="calendar-container">

                            </div>
                            <div class="calendar-info calendar-info1">

                                <div class="up-come-header">
                                    <h2>Upcoming Events</h2>
                                    <span>
                                        <a href="javascript:;">
                                            <i class="feather-plus"></i>
                                        </a>
                                    </span>
                                </div>
                                <div class="upcome-event-date">
                                    <h3>10 Jan</h3>
                                    <span><i class="fas fa-ellipsis-h"></i></span>
                                </div>
                                <div class="calendar-details">
                                    <p>08:00 am</p>
                                    <div class="calendar-box normal-bg">
                                        <div class="calandar-event-name">
                                            <h4>Botony</h4>
                                            <h5>Lorem ipsum sit amet</h5>
                                        </div>
                                        <span>08:00 - 09:00 am</span>
                                    </div>
                                </div>
                                <div class="calendar-details">
                                    <p>09:00 am</p>
                                    <div class="calendar-box normal-bg">
                                        <div class="calandar-event-name">
                                            <h4>Botony</h4>
                                            <h5>Lorem ipsum sit amet</h5>
                                        </div>
                                        <span>09:00 - 10:00 am</span>
                                    </div>
                                </div>
                                <div class="calendar-details">
                                    <p>10:00 am</p>
                                    <div class="calendar-box normal-bg">
                                        <div class="calandar-event-name">
                                            <h4>Botony</h4>
                                            <h5>Lorem ipsum sit amet</h5>
                                        </div>
                                        <span>10:00 - 11:00 am</span>
                                    </div>
                                </div>
                                <div class="upcome-event-date">
                                    <h3>10 Jan</h3>
                                    <span><i class="fas fa-ellipsis-h"></i></span>
                                </div>
                                <div class="calendar-details">
                                    <p>08:00 am</p>
                                    <div class="calendar-box normal-bg">
                                        <div class="calandar-event-name">
                                            <h4>English</h4>
                                            <h5>Lorem ipsum sit amet</h5>
                                        </div>
                                        <span>08:00 - 09:00 am</span>
                                    </div>
                                </div>
                                <div class="calendar-details">
                                    <p>09:00 am</p>
                                    <div class="calendar-box normal-bg">
                                        <div class="calandar-event-name">
                                            <h4>Mathematics	</h4>
                                            <h5>Lorem ipsum sit amet</h5>
                                        </div>
                                        <span>09:00 - 10:00 am</span>
                                    </div>
                                </div>
                                <div class="calendar-details">
                                    <p>10:00 am</p>
                                    <div class="calendar-box normal-bg">
                                        <div class="calandar-event-name">
                                            <h4>History</h4>
                                            <h5>Lorem ipsum sit amet</h5>
                                        </div>
                                        <span>10:00 - 11:00 am</span>
                                    </div>
                                </div>
                                <div class="calendar-details">
                                    <p>11:00 am</p>
                                    <div class="calendar-box break-bg">
                                        <div class="calandar-event-name">
                                            <h4>Break</h4>
                                            <h5>Lorem ipsum sit amet</h5>
                                        </div>
                                        <span>11:00 - 12:00 am</span>
                                    </div>
                                </div>
                                <div class="calendar-details">
                                    <p>11:30 am</p>
                                    <div class="calendar-box normal-bg">
                                        <div class="calandar-event-name">
                                            <h4>History</h4>
                                            <h5>Lorem ipsum sit amet</h5>
                                        </div>
                                        <span>11:30 - 12:00 am</span>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
</div>
