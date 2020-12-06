<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model backend\models\Trees */

$this->title = Yii::t('app', 'Update');
$this->params['breadcrumbs'][] = ['label' => Yii::t('app', 'Trees'), 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->id, 'url' => ['view', 'id' => $model->id]];
$this->params['breadcrumbs'][] = Yii::t('app', 'Update');
?>
<div class="trees-update">

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
