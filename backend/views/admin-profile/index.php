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
    <div class="content container-fluid">
        <div class="page-header">
            <div class="row">
                <div class="col">
                    <h3 class="page-title">
                        Profile
                    </h3>
                </div>
            </div>
        </div>

        <div class="row">
            <div class="col-md-12">
                <div class="profile-header">
                    <div class="row align-items-center">
                        <div class="col-auto profile-image">
                            <?php if (empty($data)):?>
                                <img class="rounded-circle" alt="User Image" src="/Just/just/frontend/web/admin/assets/img/profiles/user-profile.jpg">
                            <?php elseif (!empty($data)):?>
                                <img  alt="<?=$data->full_name?>" src="upload/image/<?=$data->image?>">
                            <?php endif;?>
                        </div>
                        <div class="col ms-md-n2 profile-user-info">
                            <h4 class="user-name mb-0">
                                <?php if (empty($data)):?>
                                    Full Name
                                <?php elseif (!empty($data)):?>
                                    <?=$data->full_name?>
                                <?php endif;?>
                            </h4>
                            <br>
                            <div class="user-Location">
                                <i class="fas fa-map-marker-alt"></i>
                                <?php if (empty($data)):?>
                                    Toshkent, Uzbekistan
                                <?php elseif (!empty($data)):?>
                                    <?=$data->address?>
                                <?php endif;?>
                            </div>
                            <div class="about-text">
                                <?php if (empty($data)):?>
                                    Lorem ipsum dolor sit amet.
                                <?php elseif (!empty($data)):?>
                                    <?=$data->description?>
                                <?php endif;?>
                            </div>
                        </div>
                        <div class="col-auto profile-btn">
                            <?php if (empty($data)):?>
                                <a href="<?=Url::to(['admin-profile/create'])?>" class="btn btn-success">
                                    Create
                                </a>
                            <?php elseif (!empty($data)):?>
                                <a href="<?=Url::to(['admin-profile/update', 'profile_id'=>$data->profile_id])?>" class="btn btn-primary">
                                    Edit
                                </a>
                            <?php endif;?>
                        </div>
                    </div>
                </div>
                <div class="profile-menu">
                    <ul class="nav nav-tabs nav-tabs-solid">
                        <li class="nav-item">
                            <a class="nav-link active" data-bs-toggle="tab" href="#per_details_tab">About</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" data-bs-toggle="tab" href="#password_tab">Password</a>
                        </li>
                    </ul>
                </div>
                <div class="tab-content profile-tab-cont">

                    <div class="tab-pane fade show active" id="per_details_tab">

                        <div class="row">
                            <div class="col-lg-9">
                                <div class="card">
                                    <div class="card-body">
                                        <h5 class="card-title d-flex justify-content-between">
                                            <span>Personal Details</span>
                                        </h5>
                                        <div class="row">
                                            <p class="col-sm-3 text-muted text-sm-end mb-0 mb-sm-3">Name</p>
                                            <p class="col-sm-9">
                                                <?php if (empty($data)):?>
                                                    Full Name
                                                <?php elseif (!empty($data)):?>
                                                    <?=$data->full_name?>
                                                <?php endif;?>
                                            </p>
                                        </div>
                                        <div class="row">
                                            <p class="col-sm-3 text-muted text-sm-end mb-0 mb-sm-3">Date of Birth</p>
                                            <p class="col-sm-9">
                                                <?php if (empty($data)):?>
                                                    Year date month
                                                <?php elseif (!empty($data)):?>
                                                    <?=$data->date_of_birth?>
                                                <?php endif;?>
                                            </p>
                                        </div>
                                        <div class="row">
                                            <p class="col-sm-3 text-muted text-sm-end mb-0 mb-sm-3">Email</p>
                                            <p class="col-sm-9">
                                                <a href="<?php if (empty($data)):?>
                                                        #
                                                        <?php elseif (!empty($data)):?>
                                                        mailto:<?=$data->email?>
                                                        <?php endif;?>" class="__cf_email__">
                                                    <?php if (empty($data)):?>
                                                        Email
                                                    <?php elseif (!empty($data)):?>
                                                        <?=$data->email?>
                                                    <?php endif;?>
                                                </a>
                                            </p>
                                        </div>
                                        <div class="row">
                                            <p class="col-sm-3 text-muted text-sm-end mb-0 mb-sm-3">Mobile</p>
                                            <p class="col-sm-9">
                                                <?php if (empty($data)):?>
                                                    Phone
                                                <?php elseif (!empty($data)):?>
                                                    <?=$data->phone?>
                                                <?php endif;?>
                                            </p>
                                        </div>
                                        <div class="row">
                                            <p class="col-sm-3 text-muted text-sm-end mb-0">Address</p>
                                            <p class="col-sm-9 mb-0">
                                                <?php if (empty($data)):?>
                                                    Address
                                                <?php elseif (!empty($data)):?>
                                                    <?=$data->address?>
                                                <?php endif;?>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

                    </div>


                    <div id="password_tab" class="tab-pane fade">
                        <div class="card">
                            <div class="card-body">
                                <h5 class="card-title">Change Password</h5>
                                <div class="row">
                                    <div class="col-md-10 col-lg-6">
                                        <form>
                                            <div class="form-group">
                                                <label>Old Password</label>
                                                <input type="password" class="form-control">
                                            </div>
                                            <div class="form-group">
                                                <label>New Password</label>
                                                <input type="password" class="form-control">
                                            </div>
                                            <div class="form-group">
                                                <label>Confirm Password</label>
                                                <input type="password" class="form-control">
                                            </div>
                                            <button class="btn btn-primary" type="submit">Save Changes</button>
                                        </form>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                </div>
            </div>
        </div>
    </div>

</div>
