<?php

use abdualiym\language\Language;
use abdualiym\slider\entities\Slides;

/**
 * @var $slides Slides
 */

?>
<section id="slider" class="slider-element swiper_wrapper full-screen clearfix">
        <div class="swiper-container swiper-parent">

        <div class="swiper-wrapper">

            <?php foreach ($slides as $slide): ?>
                <div class="swiper-slide dark" style="background-image: url('<?= Language::getPhotoUrl($slide) ?>');">
                    <div class="container clearfix">
                        <div class="slider-caption slider-caption-center">
                            <h2 data-animate="fadeInUp"><?= Language::get($slide, 'title') ?></h2>
                            <p class="d-none d-sm-block" data-animate="fadeInUp" data-delay="200"><?= Language::get($slide, 'content') ?></p>
                        </div>
                    </div>
                </div>
            <?php endforeach; ?>
        </div>

        <div class="slider-arrow-left"><i class="icon-angle-left"></i></div>
        <div class="slider-arrow-right"><i class="icon-angle-right"></i></div>
    </div>

</section>
