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
    <?php $this->head() ?>
    <?= Html::csrfMetaTags() ?>
    <meta name="viewport" content="width=device-width, initial-scale=1"/>
    <?php $this->registerCsrfMetaTags() ?>
    <title><?= Html::encode($this->title) ?></title>
</head>
<body class="stretched">
<?php $this->beginBody() ?>

    <?= $this->render('_header') ?>
    <?= $content ?>
    <?= $this->render('_footer') ?>

<?php $this->endBody() ?>

</body>
</html>
<?php $this->endPage() ?>
