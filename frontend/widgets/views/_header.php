<?php

use frontend\widgets\MenuWidget;

?>
<div id="top-bar">
    <div class="container clearfix">
        <div class="col_half nobottommargin">
            <div id="top-social">
                <ul>
                    <li><a href="#" class="si-facebook"><span class="ts-icon"><i class="icon-facebook"></i></span><span class="ts-text">Facebook</span></a></li>
                    <li><a href="#" class="si-twitter"><span class="ts-icon"><i class="icon-twitter"></i></span><span class="ts-text">Twitter</span></a></li>
                    <li><a href="#" class="si-instagram"><span class="ts-icon"><i class="icon-instagram2"></i></span><span class="ts-text">Instagram</span></a></li>
                    <li><a href="tel:+91.11.85412542" class="si-call"><span class="ts-icon"><i class="icon-call"></i></span><span class="ts-text">(+998 71) 202 35 04</span></a></li>
                    <li><a href="mailto:info@crrt.uz" class="si-email3"><span class="ts-icon"><i class="icon-email3"></i></span><span class="ts-text">info@crrt.uz</span></a></li>
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
                            <h5>O`zbek tili</h5>
                            <h5>English</h5>
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
                <a href="/" class="standard-logo" data-dark-logo="/logo/logo_ru.png"><img src="/logo/logo_ru.png" alt="CRRT Logo"></a>
                <a href="/" class="retina-logo" data-dark-logo="/logo/logo_ru.png"><img src="/logo/logo_ru.png" alt="CRRT Logo"></a>
            </div>

            <ul class="header-extras">
                <li><i class="i-plain icon-call nomargin"></i>
                    <div class="he-text">Телефон<span>(+998 71) 202 35 04</span></div>
                </li>
                <li><i class="i-plain icon-envelope21 nomargin"></i>
                    <div class="he-text">Почта<span>info@crrt.uz</span></div>
                </li>
                <li><i class="i-plain icon-clock1 nomargin"></i>
                    <div class="he-text">График работы<span>Пон - Суб, с 9:00 до 18:00</span></div>
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
                        <input type="text" name="q" class="form-control" value="" placeholder="Поиск..">
                    </form>
                </div>
            </div>
        </nav>
    </div>
</header>
