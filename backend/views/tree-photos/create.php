<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model backend\models\TreePhotos */

$this->title = Yii::t('app', 'Create Tree Photos');
$this->params['breadcrumbs'][] = ['label' => Yii::t('app', 'Tree Photos'), 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="tree-photos-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
