<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model backend\models\Trees */

$this->title = Yii::t('app', 'Create');
$this->params['breadcrumbs'][] = ['label' => Yii::t('app', 'Trees'), 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="trees-create">

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
