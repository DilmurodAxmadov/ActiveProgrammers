<?php

use abdualiym\block\entities\Blocks;

?>
<footer id="footer" class="dark" style="background: #333333;">

    <div class="container">

        <div class="footer-widgets-wrap clearfix">

            <div class="col_two_third">

                <div class="widget clearfix">
                    <img src="<?= (Blocks::findOne(['slug' => 'logo']))->getModelByType()->get() ?>" alt="CRRT logo" class="alignleft" style="margin-top: 8px; padding-right: 18px; border-right: 1px solid #4A4A4A;">
                    <p><?= (Blocks::findOne(['slug' => 'organization-name']))->getModelByType()->get() ?></p>
                    <div class="line" style="margin: 30px 0;"></div>

                    <div class="row" id="footer-menu-columns">

                        <div class="col-lg-3 col-6 bottommargin-sm widget_links">
                            <ul>
                                <li><a href="#">Home</a></li>
                                <li><a href="#">About</a></li>
                                <li><a href="#">FAQs</a></li>
                                <li><a href="#">Support</a></li>
                                <li><a href="#">Contact</a></li>
                            </ul>
                        </div>

                        <div class="col-lg-3 col-6 bottommargin-sm widget_links">
                            <ul>
                                <li><a href="#">Shop</a></li>
                                <li><a href="#">Portfolio</a></li>
                                <li><a href="#">Blog</a></li>
                                <li><a href="#">Events</a></li>
                                <li><a href="#">Forums</a></li>
                            </ul>
                        </div>

                        <div class="col-lg-3 col-6 bottommargin-sm widget_links">
                            <ul>
                                <li><a href="#">Corporate</a></li>
                                <li><a href="#">Agency</a></li>
                                <li><a href="#">eCommerce</a></li>
                                <li><a href="#">Personal</a></li>
                                <li><a href="#">One Page</a></li>
                            </ul>
                        </div>

                        <div class="col-lg-3 col-6 bottommargin-sm widget_links">
                            <ul>
                                <li><a href="#">Restaurant</a></li>
                                <li><a href="#">Wedding</a></li>
                                <li><a href="#">App Showcase</a></li>
                                <li><a href="#">Magazine</a></li>
                                <li><a href="#">Landing Page</a></li>
                            </ul>
                        </div>

                    </div>

                </div>
            </div>

            <div class="col_one_third col_last">
                <div class="widget clearfix" style="margin-bottom: -20px;">
                    <div class="row">

                        <div class="col-lg-12 bottommargin-sm">
                            <h5 class="nobottommargin"><?=Yii::t('app','Phone')?></h5>
                            <div class="counter counter-small"><?= (Blocks::findOne(['slug' => 'phone']))->getModelByType()->get() ?></div>
                        </div>

                        <div class="col-lg-12 bottommargin-sm">
                            <h5 class="nobottommargin"><?=Yii::t('app','Email')?></h5>
                            <div class="counter counter-small""><?= (Blocks::findOne(['slug' => 'email']))->getModelByType()->get() ?></div>
                        </div>

                    </div>
                </div>

                <div class="widget clearfix" style="margin-bottom: -20px;">
                    <div class="row">

                        <div class="col-lg-6 clearfix bottommargin-sm">
                            <a href="#" class="social-icon si-dark si-colored si-facebook nobottommargin" style="margin-right: 10px;">
                                <i class="icon-facebook"></i>
                                <i class="icon-facebook"></i>
                            </a>
                            <a href="#"><small style="display: block; margin-top: 3px;"><strong>Like us</strong><br>on Facebook</small></a>
                        </div>
                        <div class="col-lg-6 clearfix">
                            <a href="#" class="social-icon si-dark si-colored si-twitter nobottommargin" style="margin-right: 10px;">
                                <i class="icon-telegram-plane"></i>
                                <i class="icon-telegram-plane"></i>
                            </a>
                            <a href="#"><small style="display: block; margin-top: 3px;"><strong>Subscribe</strong><br>on Telegram</small></a>
                        </div>

                    </div>
                </div>

            </div>

        </div>
    </div>

    <div id="copyrights">
        <div class="container clearfix">

            <div class="col_half">
                Copyrights &copy; <?=date('Y')?> <?=Yii::t('app','All Rights Reserved')?>.
            </div>

            <div class="col_half col_last tright">
                <div class="fright copyrights-menu copyright-links clearfix">
                    <a href="#">Home</a>/<a href="#">About</a>/<a href="#">Features</a>/<a href="#">Portfolio</a>/<a href="#">FAQs</a>/<a href="#">Contact</a>
                </div>
            </div>

        </div>
    </div>
</footer>
