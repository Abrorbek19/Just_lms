<?php

/** @var \yii\web\View $this */
/** @var string $content */

use backend\assets\AdminAsset;
use common\widgets\Alert;
use yii\bootstrap5\Breadcrumbs;
use yii\bootstrap5\Html;
use yii\bootstrap5\Nav;
use yii\bootstrap5\NavBar;
use yii\helpers\Url;

AdminAsset::register($this);
?>
<?php $this->beginPage() ?>
<!DOCTYPE html>
<html lang="<?= Yii::$app->language ?>" class="h-100">
<head>
    <meta charset="<?= Yii::$app->charset ?>">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <?php $this->registerCsrfMetaTags() ?>
    <title><?= Html::encode($this->title) ?></title>
    <?php $this->head() ?>
</head>
<body class="d-flex flex-column h-100">
<?php $this->beginBody() ?>

<div class="main-wrapper">
    <?=\common\widgets\admin::widget()?>
    <div class="sidebar" id="sidebar">
        <div class="sidebar-inner slimscroll">
            <div id="sidebar-menu" class="sidebar-menu">
                <ul>
                    <li class="menu-title">
                        <span>Main Menu</span>
                    </li>
                    <li>
                        <a href="<?=Url::home()?>">
                            <i class="feather-grid"></i>
                            <span>Dashboard</span>
                        </a>
                    </li>
                    <li>
                        <a href="<?=Url::to(['user/index'])?>">
                            <i class="fas fa-building"></i>
                            <span>Users</span>
                        </a>
                    </li>
                    <li>
                        <a href="<?=Url::to(['admin/index'])?>">
                            <i class="fas fa-graduation-cap"></i>
                            <span>Admin</span>
                        </a>
                    </li>
                    <li>
                        <a href="<?=Url::to(['student/index'])?>">
                            <i class="fas fa-graduation-cap"></i>
                            <span>Student</span>
                        </a>
                    </li>
                    <li>
                        <a href="<?=Url::to(['teacher/index'])?>">
                            <i class="fas fa-chalkboard-teacher"></i>
                            <span>Teachers</span>
                        </a>
                    </li>
                    <li>
                        <a href="<?=Url::to(['group/index'])?>">
                            <i class="fas fa-book-reader"></i>
                            <span>Groups</span>
                        </a>
                    </li>
                    <li>
                        <a href="<?=Url::to(['event/index'])?>">
                            <i class="fas fa-book-reader"></i>
                            <span>Events</span>
                        </a>
                    </li>
                    <li>
                        <a href="<?=Url::to(['profile/index'])?>">
                            <i class="fas fa-book-reader"></i>
                            <span>User Profile</span>
                        </a>
                    </li>
                    <li>
                        <a href="<?=Url::to(['admin-profile/index'])?>">
                            <i class="fas fa-book-reader"></i>
                            <span>Admin Profile</span>
                        </a>
                    </li>
                    <li>
                        <a href="<?=Url::to(['video/index'])?>">
                            <i class="fas fa-book-reader"></i>
                            <span>Video</span>
                        </a>
                    </li>
                    <li>
                        <a href="<?=Url::to(['books/index'])?>">
                            <i class="fas fa-book-reader"></i>
                            <span>Books</span>
                        </a>
                    </li>
                    <li>
                        <a href="<?=Url::to(['audio-category/index'])?>">
                            <i class="fas fa-book-reader"></i>
                            <span>Audio Category</span>
                        </a>
                    </li>
                    <li>
                        <a href="<?=Url::to(['audio/index'])?>">
                            <i class="fas fa-book-reader"></i>
                            <span>Audio</span>
                        </a>
                    </li>
                    <li>
                        <a href="<?=Url::to(['homework/index'])?>">
                            <i class="fas fa-book-reader"></i>
                            <span>Homework</span>
                        </a>
                    </li>
                    <li>
                        <a href="<?=Url::to(['library/index'])?>">
                            <i class="fas fa-book-reader"></i>
                            <span>Library</span>
                        </a>
                    </li>
                    <li>
                        <a href="<?=Url::to(['week/index'])?>">
                            <i class="fas fa-book-reader"></i>
                            <span>Week</span>
                        </a>
                    </li>
                    <li>
                        <a href="<?=Url::to(['video-audio-file/index'])?>">
                            <i class="fas fa-book-reader"></i>
                            <span>Video Audio File</span>
                        </a>
                    </li>
                    <li class="menu-title">
                        <span>Management</span>
                    </li>
                    <li class="submenu">
                        <a href="#"><i class="fas fa-file-invoice-dollar"></i> <span> Accounts</span> <span
                                    class="menu-arrow"></span></a>
                        <ul>
                            <li><a href="fees-collections.html">Fees Collection</a></li>
                            <li><a href="expenses.html">Expenses</a></li>
                            <li><a href="salary.html">Salary</a></li>
                            <li><a href="add-fees-collection.html">Add Fees</a></li>
                            <li><a href="add-expenses.html">Add Expenses</a></li>
                            <li><a href="add-salary.html">Add Salary</a></li>
                        </ul>
                    </li>
                    <li>
                        <a href="holiday.html"><i class="fas fa-holly-berry"></i> <span>Holiday</span></a>
                    </li>
                    <li>
                        <a href="fees.html"><i class="fas fa-comment-dollar"></i> <span>Fees</span></a>
                    </li>
                    <li>
                        <a href="exam.html"><i class="fas fa-clipboard-list"></i> <span>Exam list</span></a>
                    </li>
                    <li>
                        <a href="event.html"><i class="fas fa-calendar-day"></i> <span>Events</span></a>
                    </li>
                    <li>
                        <a href="time-table.html"><i class="fas fa-table"></i> <span>Time Table</span></a>
                    </li>
                    <li>
                        <a href="library.html"><i class="fas fa-book"></i> <span>Library</span></a>
                    </li>
                    <li>
                        <a href="settings.html"><i class="fas fa-cog"></i> <span>Settings</span></a>
                    </li>
                    <li class="menu-title">
                        <span>Pages</span>
                    </li>

                    <li class="submenu">
                        <a href="#">
                            <i class="fas fa-shield-alt"></i>
                            <span> Authentication </span>
                            <span class="menu-arrow"></span>
                        </a>
                        <ul>
                            <li><a href="login.html">Login</a></li>
                            <li><a href="register.html">Register</a></li>
                            <li><a href="forgot-password.html">Forgot Password</a></li>
                            <li><a href="error-404.html">Error Page</a></li>
                        </ul>
                    </li>

                    <li>
                        <a href="blank-page.html"><i class="fas fa-file"></i> <span>Blank Page</span></a>
                    </li>


                </ul>
            </div>
        </div>
    </div>

    <main role="main" class="flex-shrink-0">
        <div class="container">
            <?= Breadcrumbs::widget([
                'links' => isset($this->params['breadcrumbs']) ? $this->params['breadcrumbs'] : [],
            ]) ?>
            <?= Alert::widget() ?>
            <?= $content ?>
        </div>
    </main>

</div>

<?php $this->endBody() ?>
</body>
</html>
<?php $this->endPage();
