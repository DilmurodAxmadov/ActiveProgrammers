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
    ];
    public $js = [
        'plugins/owl/owl.carousel.min.js',
        'plugins/scroll.js',
        'js/scripts.js',
    ];
    public $depends = [
        YiiAsset::class,
    ];
}
