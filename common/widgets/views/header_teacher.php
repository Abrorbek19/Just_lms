<?php

use yii\bootstrap5\Html;
use yii\helpers\Url; ?>

<div class="header">
    <div class="header-left">
        <a href="<?=Url::to(['teacher/index'])?>" class="logo">
            <img src="../admin/assets/img/logo.png" alt="Logo" />
        </a>
    </div>


    <ul class="nav user-menu">
        <li class="nav-item dropdown language-drop me-2">
            <a
                href="#"
                class="dropdown-toggle nav-link header-nav-list"
                data-bs-toggle="dropdown"
            >
                <img src="../admin/assets/img/icons/header-icon-01.svg" alt="" />
            </a>
            <div class="dropdown-menu">
                <a class="dropdown-item" href="javascript:;"
                ><i class="flag flag-lr me-2"></i>English</a
                >
                <a class="dropdown-item" href="javascript:;"
                ><i class="flag flag-bl me-2"></i>Francais</a
                >
                <a class="dropdown-item" href="javascript:;"
                ><i class="flag flag-cn me-2"></i>Turkce</a
                >
            </div>
        </li>

        <li class="nav-item zoom-screen me-2">
            <a href="#" class="nav-link header-nav-list">
                <img src="../admin/assets/img/icons/header-icon-04.svg" alt="" />
            </a>
        </li>

        <li class="nav-item dropdown has-arrow new-user-menus">
            <a
                href="#"
                class="dropdown-toggle nav-link"
                data-bs-toggle="dropdown"
            >
							<span class="user-img">
                                 <?php if (empty($header)):?>
								<img
                                    class="rounded-circle"
                                    src="../admin/assets/img/profiles/user-profile.jpg"
                                    width="31"
                                    alt="User"
                                />
                                <?php elseif (!empty($header)):?>
                                <img
                                        class="rounded-circle"
                                        src="../upload/image/<?=$header->image?>"
                                        width="31"
                                        alt="<?=$header->full_name?>"
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
                        <?php if (empty($header)):?>
                            <img
                                    class="rounded-circle"
                                    src="../admin/assets/img/profiles/user-profile.jpg"
                                    width="31"
                                    alt="User"
                            />
                        <?php elseif (!empty($header)):?>
                            <img
                                    class="rounded-circle"
                                    src="../upload/image/<?=$header->image?>"
                                    width="31"
                                    alt="<?=$header->full_name?>"
                            />
                        <?php endif;?>
                    </div>
                    <div class="user-text">
                        <h6><?=Yii::$app->user->identity->username?></h6>
                        <p class="text-muted mb-0"><?=Yii::$app->user->id?></p>
                    </div>
                </div>
                <a class="dropdown-item" href="<?=Url::to(['profile/index'])?>">My Profile</a>
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
