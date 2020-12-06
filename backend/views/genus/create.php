<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model backend\models\Genus */

$this->title = Yii::t('app', 'Create');
$this->params['breadcrumbs'][] = ['label' => Yii::t('app', 'Genus'), 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="genus-create">

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
