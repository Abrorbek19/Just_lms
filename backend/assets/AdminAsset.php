<?php

namespace backend\assets;

use yii\web\AssetBundle;

/**
 * Main backend application asset bundle.
 */
class AdminAsset extends AssetBundle
{
    public $basePath = '@webroot';
    public $baseUrl = '@web';
    public $css = [
        'admin/assets/plugins/bootstrap/css/bootstrap.min.css',
        'admin/assets/plugins/feather/feather.css',
        'admin/assets/plugins/icons/flags/flags.css',
        'admin/assets/plugins/fontawesome/css/fontawesome.min.css',
        'admin/assets/plugins/fontawesome/css/all.min.css',
        'admin/assets/plugins/select2/css/select2.min.css',
        'admin/assets/css/style.css',
    ];
    public $js = [
        'admin/assets/js/jquery-3.6.0.min.js',
        'admin/assets/plugins/bootstrap/js/bootstrap.bundle.min.js',
        'admin/assets/js/feather.min.js',
        'admin/assets/plugins/slimscroll/jquery.slimscroll.min.js',
        'admin/assets/plugins/apexchart/apexcharts.min.js',
        'admin/assets/plugins/apexchart/chart-data.js',
        'admin/assets/plugins/select2/js/select2.min.js',
        'admin/assets/js/script.js',
    ];
    public $depends = [
        'yii\web\YiiAsset',
        'yii\bootstrap5\BootstrapAsset',
    ];
}
