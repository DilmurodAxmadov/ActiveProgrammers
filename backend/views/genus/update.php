<?php

/* @var $this yii\web\View */
/* @var $model backend\models\Genus */

$this->title = Yii::t('app', 'Update');
$this->params['breadcrumbs'][] = ['label' => Yii::t('app', 'Genus'), 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->id, 'url' => ['view', 'id' => $model->id]];
$this->params['breadcrumbs'][] = Yii::t('app', 'Update');
?>
<div class="genus-update">

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
