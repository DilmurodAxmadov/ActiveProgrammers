<?php

use abdualiym\block\entities\Blocks;
use frontend\widgets\MenuWidget;

(Yii::$app->getModule('block'))->init();
$phone = (Blocks::findOne(['slug' => 'phone']))->getModelByType()->get();
$phoneCleared = preg_replace("/[^\d]/u", "", (string)$phone);
$email = (Blocks::findOne(['slug' => 'email']))->getModelByType()->get();
?>
<div id="top-bar">
    <div class="container clearfix">
        <div class="col_half nobottommargin">
            <div id="top-social">
                <ul>
                    <li><a href="#" class="si-twitter"><span class="ts-icon"><i class="icon-telegram-plane"></i></span><span class="ts-text">Telegram</span></a></li>
                    <li><a href="#" class="si-facebook"><span class="ts-icon"><i class="icon-facebook"></i></span><span class="ts-text">Facebook</span></a></li>
                    <li><a href="#" class="si-twitter"><span class="ts-icon"><i class="icon-twitter"></i></span><span class="ts-text">Twitter</span></a></li>
                    <li><a href="#" class="si-instagram"><span class="ts-icon"><i class="icon-instagram2"></i></span><span class="ts-text">Instagram</span></a></li>
                    <li><a href="tel:+<?= $phoneCleared ?>" class="si-call"><span class="ts-icon"><i class="icon-call"></i></span><span
                                    class="ts-text"><?= $phone ?></span></a></li>
                    <li><a href="mailto:<?= $email ?>" class="si-email3"><span class="ts-icon"><i class="icon-email3"></i></span><span class="ts-text"><?= $email ?></span></a></li>
                </ul>
            </div>
        </div>

        <div class="col_half fright col_last nobottommargin">
            <div class="top-links">
                <ul>
                    <li><a href="https://pm.gov.uz/uz"><i class="ts-icon icon-reply"></i> Виртуальная приемная</a></li>
                    <li><a href="#"><i class="ts-icon icon-glasses"></i> Специальные возможности</a></li>
                    <li><a href="#">Русский</a>
                        <div class="top-link-section text-right font-weight-bold">
                            <h5><a href="/ru">Русский</a></h5>
                            <h5><a href="/uz">O`zbek tili</a></h5>
                            <h5><a href="/en">English</a></h5>
                        </div>
                    </li>
                </ul>
            </div>
        </div>
    </div>
</div>

<header id="header" class="sticky-style-2">
    <div class="header-middle-container">
        <div class="container clearfix">
            <div id="logo">
                <a href="/" class="standard-logo" data-dark-logo="<?= (Blocks::findOne(['slug' => 'logo']))->getModelByType()->get() ?>"><img
                            src="<?= (Blocks::findOne(['slug' => 'logo']))->getModelByType()->get() ?>" alt="CRRT Logo"></a>
                <a href="/" class="retina-logo" data-dark-logo="<?= (Blocks::findOne(['slug' => 'logo']))->getModelByType()->get() ?>"><img
                            src="<?= (Blocks::findOne(['slug' => 'logo']))->getModelByType()->get() ?>" alt="CRRT Logo"></a>
            </div>

            <ul class="header-extras">
                <li><i class="i-plain icon-call nomargin"></i>
                    <div class="he-text"><?= Yii::t('app', 'Phone') ?><span><?= $phone ?></span></div>
                </li>
                <li><i class="i-plain icon-envelope21 nomargin"></i>
                    <div class="he-text"><?= Yii::t('app', 'Email') ?><span><?= $email ?></span></div>
                </li>
                <li><i class="i-plain icon-clock1 nomargin"></i>
                    <div class="he-text"><?= Yii::t('app', 'Schedule') ?><span><?= (Blocks::findOne(['slug' => 'schedule']))->getModelByType()->get() ?></span></div>
                </li>
            </ul>
        </div>
    </div>

    <div id="header-wrap">
        <nav id="primary-menu" class="style-2">
            <div class="container clearfix">
                <?= MenuWidget::widget() ?>

                <div id="top-search">
                    <a href="#" id="top-search-trigger"><i class="icon-search3"></i><i class="icon-line-cross"></i></a>
                    <form action="#" method="get">
                        <input type="text" name="q" class="form-control" value="" placeholder="<?= Yii::t('app', 'Search') ?>...">
                    </form>
                </div>
            </div>
        </nav>
    </div>
</header>
