<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model backend\models\Park */

$this->title = 'Create Park';
$this->params['breadcrumbs'][] = ['label' => 'Parks', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="park-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
