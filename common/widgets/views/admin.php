<?php

use yii\bootstrap5\Html;
use yii\helpers\Url; ?>

<div class="header">

    <div class="header-left">
        <a href="<?=Url::home()?>" class="logo">
            <img src="admin/assets/img/logo.png" alt="Logo">
        </a>
        <a href="<?=Url::home()?>" class="logo logo-small">
            <img src="admin/assets/img/logo-small.png" alt="Logo" width="30" height="30">
        </a>
    </div>
    <div class="menu-toggle">
        <a href="javascript:void(0);" id="toggle_btn">
            <i class="fas fa-bars"></i>
        </a>
    </div>

    <div class="top-nav-search">
        <form>
            <input type="text" class="form-control" placeholder="Search here">
            <button class="btn" type="submit"><i class="fas fa-search"></i></button>
        </form>
    </div>
    <a class="mobile_btn" id="mobile_btn">
        <i class="fas fa-bars"></i>
    </a>

    <ul class="nav user-menu">
        <li class="nav-item dropdown noti-dropdown language-drop me-2">
            <a href="#" class="dropdown-toggle nav-link header-nav-list" data-bs-toggle="dropdown">
                <img src="admin/assets/img/icons/uzbek2.svg" alt="">
            </a>
            <div class="dropdown-menu ">
                <div class="noti-content">
                    <div>
                        <a class="dropdown-item" href="javascript:;">
                            <i class="flag flag-uz me-2"></i>
                            Uzbek
                        </a>
                        <a class="dropdown-item" href="javascript:;">
                            <i class="flag flag-en me-2"></i>
                            English
                        </a>
                        <a class="dropdown-item" href="javascript:;">
                            <i class="flag flag-jp me-2"></i>
                            Japan
                        </a>
                    </div>
                </div>
            </div>
        </li>

        <li class="nav-item zoom-screen me-2">
            <a href="#" class="nav-link header-nav-list win-maximize">
                <img src="admin/assets/img/icons/header-icon-04.svg" alt="">
            </a>
        </li>

        <li class="nav-item dropdown has-arrow new-user-menus">
            <a href="#" class="dropdown-toggle nav-link" data-bs-toggle="dropdown">
                    	<span class="user-img">
                                 <?php if (empty($admin)):?>
                                     <img
                                             class="rounded-circle"
                                             src="Just/just/frontend/web/admin/assets/img/profiles/user-profile.jpg"
                                             width="31"
                                             alt="Jassa Rich"
                                     />
                                 <?php elseif (!empty($admin)):?>
                                     <img
                                             class="rounded-circle"
                                             src="/Just/just/backend/web/upload/image/<?=$admin->image?>"
                                             width="31"
                                             alt="<?=$admin->full_name?>"
                                     />
                                 <?php endif;?>
								<div class="user-text">
									<h6><?=Yii::$app->user->identity->username?></h6>
									<p class="text-muted mb-0"><?=Yii::$app->user->id?></p>
								</div>
							</span>
            </a>
            <div class="dropdown-menu">
                <div class="user-header">
                    <div class="avatar avatar-sm">
                        <?php if (empty($admin)):?>
                            <img
                                    class="rounded-circle"
                                    src="../admin/assets/img/profiles/user-profile.jpg"
                                    width="31"
                                    alt="Jassa Rich"
                            />
                        <?php elseif (!empty($admin)):?>
                            <img
                                    class="rounded-circle"
                                    src="/Just/just/backend/web/upload/image/<?=$admin->image?>"
                                    width="31"
                                    alt="<?=$admin->full_name?>"
                            />
                        <?php endif;?>
                    </div>
                    <div class="user-text">
                        <h6><?=Yii::$app->user->identity->username?></h6>
                        <p class="text-muted mb-0"><?=Yii::$app->user->id?></p>
                    </div>
                </div>
                <a class="dropdown-item" href="<?=Url::to(['admin-profile/index'])?>">My Profile</a>
                <a class="dropdown-item" href="">
                    <?=Html::beginForm(['/site/logout'], 'post', ['class' => 'd-flex'])
                    . Html::submitButton('Logout (' . Yii::$app->user->identity->username . ')', ['class' => 'btn btn-link logout text-decoration-none'])
                    . Html::endForm();
                    ?>
                </a>
            </div>
        </li>

    </ul>

</div>
