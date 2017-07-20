<?php

namespace frontend\assets;

use yii\web\AssetBundle;

class AppAsset extends AssetBundle
{
    public $basePath = '@webroot';
    public $baseUrl = '@web';
    public $css = [
        '//fonts.googleapis.com/css?family=Roboto:400,300,700,900&amp;subset=cyrillic-ext',
        '//fonts.googleapis.com/css?family=Roboto+Slab:400,700&amp;subset=cyrillic-ext',
        'css/normalize.min.css',
        'css/libs.css',
        'css/main.css',
        'css/mobile.css',
        '//cdn.jsdelivr.net/jquery.slick/1.6.0/slick.css',
    ];
    public $js = [
        '//maps.googleapis.com/maps/api/js?key=AIzaSyAYBg8KC7jzGXqsJO4ZvBUBr-zHT_0qm2s&callback=initMap',
        'js/vendor/modernizr-2.6.2-respond-1.1.0.min.js',
        'js/vendor/libs.js',
        'js/main.js',
        'js/site.js',
        '//cdn.jsdelivr.net/jquery.slick/1.6.0/slick.min.js',
    ];
    public $depends = [
        'yii\web\YiiAsset',
        'yii\bootstrap\BootstrapAsset',
    ];
}
