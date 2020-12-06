<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel backend\models\ParkSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Parks';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="park-index">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Create Park', ['create'], ['class' => 'btn btn-success']) ?>
    </p>

    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            'id',
            'name_uz',
            'address_uz',
            'description_uz',
            'name_ru',
            //'address_ru',
            //'description_ru',
            //'name_en',
            //'address_en',
            //'description_en',
            //'region_id',

            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>


</div>
