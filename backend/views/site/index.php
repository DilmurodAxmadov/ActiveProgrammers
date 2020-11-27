<?php

/* @var $this yii\web\View */

use backend\models\TreePhotos;
use backend\models\Trees;
use yii\helpers\Url;

$this->title = 'Админ панел';
?>
<div class="site-index">

    <div class="row">

        <div class="col-lg-3 col-xs-6">
            <div class="small-box bg-green">
                <div class="inner">
                    <h3><?= Trees::find()->count(); ?><sup style="font-size: 20px"></sup></h3>
                    <p>Деревья</p>
                </div>
                <div class="icon"><i class="fa fa-tree"></i></div>
                <a href="<?= Url::to('/trees/index') ?>" class="small-box-footer">Далее <i class="fa fa-arrow-circle-right"></i></a>
            </div>
        </div>

        <div class="col-lg-3 col-xs-6">
            <div class="small-box bg-blue">
                <div class="inner">
                    <h3><?= TreePhotos::find()->count(); ?><sup style="font-size: 20px"></sup></h3>
                    <p>Фото</p>
                </div>
                <div class="icon"><i class="fa fa-image"></i></div>
                <a href="<?= Url::to('/tree-photos/index') ?>" class="small-box-footer">Далее <i class="fa fa-arrow-circle-right"></i></a>
            </div>
        </div>

    </div>


</div>
