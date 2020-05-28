<?php

use abdualiym\cms\entities\Menu;
use abdualiym\language\Language;

/**
 * @var $menu Menu
 */
$url = Yii::$app->language;
?>

<div id="primary-menu-trigger"><i class="icon-reorder"></i></div>
<ul>
    <?php foreach ($menu as $key => $value) : ?>
        <?php $parent = isset($value['childs']) && $value['childs']; ?>
        <li><a href="<?= $value['link'] ?>">
                <div><?= Language::get($value, 'title') ?></div>
            </a>
            <?php if ($parent): ?>
                <ul>
                    <?php foreach ($value['childs'] as $childValue) : ?>
                        <li>
                            <a href="<?= $childValue['link'] ?>">
                                <div><?= Language::get($childValue, 'title') ?></div>
                            </a>
                        </li>
                    <?php endforeach; ?>
                </ul>
            <?php endif; ?>
        </li>
    <?php endforeach; ?>
</ul>


