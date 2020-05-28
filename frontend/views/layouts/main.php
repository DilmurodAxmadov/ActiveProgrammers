<?php

/* @var $this View */

/* @var $content string */

use common\widgets\Alert;
use frontend\assets\AppAsset;
use frontend\widgets\FooterWidget;
use frontend\widgets\Header;
use yii\helpers\Html;
use yii\web\View;
use yii\widgets\Breadcrumbs;

AppAsset::register($this);
?>
<?php $this->beginPage() ?>
<!DOCTYPE html>
<html dir="ltr" lang="en-US">
<head>
    <meta http-equiv="content-type" content="text/html; charset=utf-8"/>
    <meta name="author" content="SemiColonWeb"/>
    <link href="https://fonts.googleapis.com/css?family=Lato:300,400,400i,700|Raleway:300,400,500,600,700|Crete+Round:400i" rel="stylesheet" type="text/css"/>
    <link rel="stylesheet" href="/temp/HTML/css/bootstrap.css" type="text/css"/>
    <?php $this->head() ?>
    <link rel="stylesheet" href="/temp/HTML/css/swiper.css" type="text/css"/>
    <link rel="stylesheet" href="/temp/HTML/css/dark.css" type="text/css"/>
    <link rel="stylesheet" href="/temp/HTML/css/font-icons.css" type="text/css"/>
    <link rel="stylesheet" href="/temp/HTML/css/animate.css" type="text/css"/>
    <link rel="stylesheet" href="/temp/HTML/css/magnific-popup.css" type="text/css"/>
    <link rel="stylesheet" href="/temp/HTML/css/responsive.css" type="text/css"/>
    <meta name="viewport" content="width=device-width, initial-scale=1"/>
    <?php $this->registerCsrfMetaTags() ?>
    <title><?= Html::encode($this->title) ?></title>
</head>
<body class="stretched">
<?php $this->beginBody() ?>

<!-- Document Wrapper
============================================= -->
<div id="wrapper" class="clearfix">

    <?= Header::widget() ?>

    <?= Breadcrumbs::widget([
        'links' => isset($this->params['breadcrumbs']) ? $this->params['breadcrumbs'] : [],
    ]) ?>
    <?= Alert::widget() ?>
    <?= $content ?>

    <?= FooterWidget::widget() ?>

</div><!-- #wrapper end -->

<!-- Go To Top
============================================= -->
<div id="gotoTop" class="icon-angle-up"></div>
<?php $this->endBody() ?>
<!-- External JavaScripts
============================================= -->
<script src="/temp/HTML/js/plugins.js"></script>
<!-- Footer Scripts
============================================= -->
<script src="/temp/HTML/js/functions.js"></script>
</body>
</html>
<?php $this->endPage() ?>
