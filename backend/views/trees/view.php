<?php

use backend\models\Trees;
use yii\helpers\Html;
use yii\web\YiiAsset;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model backend\models\Trees */

$this->title = $model->id;
$this->params['breadcrumbs'][] = ['label' => Yii::t('app', 'Trees'), 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
YiiAsset::register($this);
?>
<div class="trees-view">

    <p>
        <?= Html::a(Yii::t('app', 'Update'), ['update', 'id' => $model->id], ['class' => 'btn btn-primary']) ?>
        <?= Html::a(Yii::t('app', 'Delete'), ['delete', 'id' => $model->id], [
            'class' => 'btn btn-danger',
            'data' => [
                'confirm' => Yii::t('app', 'Are you sure you want to delete this item?'),
                'method' => 'post',
            ],
        ]) ?>
    </p>

    <?= DetailView::widget([
        'model' => $model,
        'attributes' => [
            'id',
            'name_ru',
            'genus.name_ru',
            'description_ru:ntext',
            'special_signs_ru:ntext',
            [
                'attribute' => 'girth',
                'value' => function (Trees $model) {
                    return $model->getGirthInSM();
                },
                'label' => "Обхват(см)",
            ],
            'planted_at:date',
            'latitude',
            'longitude',
            'main_photo_id',
            'status',
            'createdBy.username',
            'updatedBy.username',
            'created_at:datetime',
            'updated_at:datetime',
        ],
    ]) ?>

</div>
