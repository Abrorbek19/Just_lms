<?php

use common\models\Student;
use yii\helpers\Html;
use yii\helpers\Url;
use yii\grid\ActionColumn;
use yii\grid\GridView;

/** @var yii\web\View $this */
/** @var common\models\StudentSearch $searchModel */
/** @var yii\data\ActiveDataProvider $dataProvider */

$this->title = Yii::t('app', 'Students');
//$this->params['breadcrumbs'][] = $this->title;
?>
<div class="student-index">
        <div class="content container-fluid" style="padding-top:85px;">
              <div class="row">
                   <div class="karusel">
                       <div class="col-xxl-6 col-xl-6 col-lg-6 col-md-12 col-sm-12 col-12" style="margin: 0px 20px 0 20px">
                           <a href="#" >
                               <div class="column">
                                   <div class="card text-center">
                                       <img src="../admin/assets/img/card/group.svg" width="70px" height="70px" style="margin:12px auto;">
                                       <h2>
                                           Group
                                       </h2>
                                       <p>
                                           <?=$student->group->group_name;?>
                                       </p>
                                   </div>
                               </div>
                           </a>
                       </div>
                       <div class="col-xxl-6 col-xl-6 col-lg-6 col-md-12 col-sm-12 col-12" style="margin: 0px 20px 0 20px">
                           <a href="#" >
                               <div class="column">
                                   <div class="card text-center">
                                       <img src="../admin/assets/img/card/teacher.svg" width="70px" height="70px" style="margin:12px auto;">
                                       <h2>Teacher</h2>
                                       <p>Text</p>
                                   </div>
                               </div>
                           </a>
                       </div>
                       <div class="col-xxl-6 col-xl-6 col-lg-6 col-md-12 col-sm-12 col-12" style="margin: 0px 20px 0 20px">
                           <a href="#" >
                               <div class="column">
                                   <div class="card text-center">
                                       <img src="../admin/assets/img/card/paid.svg" width="70px" height="70px" style="margin:12px auto;">
                                       <h2>Paid</h2>
                                       <p>Text</p>
                                   </div>
                               </div>
                           </a>
                       </div>
                       <div class="col-xxl-6 col-xl-6 col-lg-6 col-md-12 col-sm-12 col-12" style="margin: 0px 20px 0 20px">
                           <a href="#" >
                               <div class="column">
                                   <div class="card text-center">
                                       <img src="../admin/assets/img/card/clock.svg" width="70px" height="70px" style="margin:12px auto;">
                                       <h2>Timetable</h2>
                                       <p>
                                           <?=$student->group->lesson_days ;?>,<?=$student->group->lesson_time?>
                                       </p>
                                   </div>
                               </div>
                           </a>
                       </div>
                       <div class="col-xxl-6 col-xl-6 col-lg-6 col-md-12 col-sm-12 col-12" style="margin: 0px 20px 0 20px">
                           <a href="#" >
                               <div class="column">
                                   <div class="card text-center">
                                       <img src="../admin/assets/img/card/teacher.svg" width="70px" height="70px" style="margin:12px auto;">
                                       <h2>Support</h2>
                                       <p>Text</p>
                                   </div>
                               </div>
                           </a>
                       </div>
                       <div class="col-xxl-6 col-xl-6 col-lg-6 col-md-12 col-sm-12 col-12" style="margin: 0px 20px 0 20px">
                           <a href="#" >
                               <div class="column">
                                   <div class="card text-center">
                                       <img src="../admin/assets/img/card/mid-exam.svg" width="70px" height="70px" style="margin:12px auto;">
                                       <h2>Mid Exam</h2>
                                       <p>Text</p>
                                   </div>
                               </div>
                           </a>
                       </div>
                   </div>
              </div>

            <div class="row mt-5">
                <div class="col-12 col-lg-12 col-xl-8">
                    <div class="row">
                        <div class="col-xxl-6 col-xl-6 col-lg-6 col-md-12 col-sm-12 col-12">
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
                        <div class="col-xxl-6 col-xl-6 col-lg-6 col-md-12 col-sm-12 col-12">
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
                        <div class="col-xxl-6 col-xl-6 col-lg-6 col-md-12 col-sm-12 col-12">
                            <a href="<?=Url::to(['homework/index'])?>" >
                                <div class="column">
                                    <div class="card text-center">
                                        <img src="../admin/assets/img/card/hw.svg" width="65px" height="63px" style="margin:12px auto;">
                                        <h2>Homework</h2>
                                        <p>Text</p>
                                    </div>
                                </div>
                            </a>
                        </div>
                        <div class="col-xxl-6 col-xl-6 col-lg-6 col-md-12 col-sm-12 col-12">
                            <a href="<?=Url::to(['library/index'])?>" >
                                <div class="column">
                                    <div class="card text-center">
                                        <img src="../admin/assets/img/card/lib.svg" width="65px" height="63px" style="margin:12px auto;">
                                        <h2>Library</h2>
                                        <p>Text</p>
                                    </div>
                                </div>
                            </a>
                        </div>
                        <div class="col-xxl-6 col-xl-6 col-lg-6 col-md-12 col-sm-12 col-12">
                            <a href="#" >
                                <div class="column">
                                    <div class="card text-center">
                                        <img src="../admin/assets/img/card/payment.svg" width="65px" height="63px" style="margin:12px auto;">
                                        <h2>Pay online</h2>
                                        <p>Text</p>
                                    </div>
                                </div>
                            </a>
                        </div>
                        <div class="col-xxl-6 col-xl-6 col-lg-6 col-md-12 col-sm-12 col-12">
                            <a href="#" >
                                <div class="column">
                                    <div class="card text-center">
                                        <img src="../admin/assets/img/card/off-hours.svg" width="65px" height="63px" style="margin:12px auto;">
                                        <h2>Office hours</h2>
                                        <p>Text</p>
                                    </div>
                                </div>
                            </a>
                        </div>
                        <div class="col-xxl-6 col-xl-6 col-lg-6 col-md-12 col-sm-12 col-12">
                            <a href="<?=Url::to(['books/index'])?>" >
                                <div class="column">
                                    <div class="card text-center">
                                        <img src="../admin/assets/img/card/books.svg" width="65px" height="63px" style="margin:12px auto;">
                                        <h2>Books</h2>
                                        <p>Text</p>
                                    </div>
                                </div>
                            </a>
                        </div>
                        <div class="col-xxl-6 col-xl-6 col-lg-6 col-md-12 col-sm-12 col-12">
                            <a href="<?=Url::to(['video/index'])?>" >
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
                <div class="col-12 col-lg-12 col-xl-4 d-flex">
                    <div class="card flex-fill comman-shadow">
                        <div class="card-body">
                            <div id="calendar-doctor" class="calendar-container"></div>
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
                                            <h4>Mathematics</h4>
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