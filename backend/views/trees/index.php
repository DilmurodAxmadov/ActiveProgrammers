<?php

use yii\grid\ActionColumn;
use yii\grid\GridView;
use yii\grid\SerialColumn;
use yii\helpers\Html;
use yii\widgets\Pjax;

/* @var $this yii\web\View */
/* @var $searchModel backend\models\TreesSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = Yii::t('app', 'Trees');
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="trees-index">

    <p>
        <?= Html::a(Yii::t('app', 'Create'), ['create'], ['class' => 'btn btn-success']) ?>
    </p>

    <?php Pjax::begin(); ?>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => SerialColumn::class],

            'id',
            'name_ru',
            'girth',
            'planted_at:date',
            [
                'attribute' => 'main_photo_id',
                'value' => function ($searchModel) {
                    return Html::img($searchModel->mainPhoto ? $searchModel->mainPhoto->getThumbFileUrl('file', 'admin') : Yii::getAlias('@backend/web') . '/placeholder.jpg');
                },
                'format' => 'raw',
            ],
            'status',

            ['class' => ActionColumn::class],
        ],
    ]); ?>

    <?php Pjax::end(); ?>

</div>
