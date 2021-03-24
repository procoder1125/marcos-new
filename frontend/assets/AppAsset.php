<?php

namespace frontend\assets;

use yii\web\AssetBundle;

/**
 * Main frontend application asset bundle.
 */
class AppAsset extends AssetBundle
{
    public $basePath = '@webroot';
    public $baseUrl = '@web';
    public $css = [
        //'css/site.css',
        "/libs/Waves-master/dist/waves.min.css",
        "/libs/bootstrap-4.1.3-dist/css/bootstrap.min.css",
        "/libs/ionicons-2.0.1/css/ionicons.min.css",
        "/libs/owlcarousel/assets/owl.carousel.min.css",
        "/css/animate.css",
        "/libs/splitting.css",
        "/css/base.css",
        "/css/style.css",
        "/css/register.css",
    ];
    public $js = [
        "/libs/jquery-3.3.1.min.js",
        "/libs/bootstrap-4.1.3-dist/js/bootstrap.min.js",
        "/libs/Waves-master/dist/waves.min.js",
        "/libs/owlcarousel/owl.carousel.min.js",
        "/libs/splitting.js",
        "/libs/skrollr.min.js",
        "/libs/wow/wow.min.js",
        "/libs/particles.js/particles.min.js",
        "/libs/particles.js/demo/js/app.js",
        "/js/script.js",
        "/js/ribbon.js",

        "libs/particles.js/particles.min.js",
        "libs/particles.js/demo/js/app.js",
    ];
    public $depends = [
        'yii\web\YiiAsset',
        //'yii\bootstrap\BootstrapAsset',
    ];
}
