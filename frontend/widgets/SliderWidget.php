<?php

namespace frontend\widgets;

use abdualiym\slider\entities\Slides;
use yii\bootstrap\Widget;

class SliderWidget extends Widget
{

    public function run()
    {
        return $this->render('_slider', [
            'slides' => Slides::getBySlug('slider')
        ]);
    }

}
