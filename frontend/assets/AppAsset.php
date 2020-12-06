<?php

namespace frontend\assets;

use yii\web\AssetBundle;
use yii\web\YiiAsset;

/**
 * Main frontend application asset bundle.
 */
class AppAsset extends AssetBundle
{
    public $basePath = '@webroot';
    public $baseUrl = '@web';
    public $css = [
        'plugins/owl/owl.carousel.min.css',
        'plugins/owl/owl.theme.default.min.css',
        'css/site.css',
        'css/style.css',
        'css/animate.css',
        'css/bootstrap.min.css',
        'css/brands.css',
        'css/effect.css',
        'css/font-awesome.min.css',
        'css/icon.css',
        'css/magnific-popup.css',
        'css/owl.carousel.css',
        'css/reset.css',
        'css/responsive.css',
    ];
    public $js = [
        'js/jquery-1.12.4.min.js',
        'plugins/owl/owl.carousel.min.js',
        'plugins/scroll.js',
        'js/scripts.js',
        'js/bootstrap.min.js',
        'js/gmaps.min.js',
        'js/isotope.js',
        'js/jquery.countdown.min.js',
        'js/jquery.enllax.min.js',
        'js/magnific-popup.js',
        'js/main.js',
        'js/map-helper.js',
        'js/numscroller-1.0.js',
    ];
    public $depends = [
        YiiAsset::class,
    ];
}
