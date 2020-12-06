<?php

use backend\models\PhotosForm;
use backend\models\Trees;
use kartik\file\FileInput;
use yii\helpers\Html;
use yii\web\YiiAsset;
use yii\widgets\ActiveForm;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model backend\models\Trees */
/* @var $photosForm PhotosForm
 */

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
            [
                'attribute' => 'planted_at',
                'value' => function (Trees $model) {
                    return Yii::$app->formatter->asDate($model->planted_at) . "(". Yii::$app->formatter->asRelativeTime($model->planted_at).")";
                },
            ],
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

    <div class="box" id="photos">
        <div class="box-header with-border">Rasmlari</div>
        <div class="box-body">

            <div class="row">
                <?php foreach ($model->photos as $photo): ?>
                    <div class="col-md-2 col-xs-3" style="text-align: center">
                        <div class="btn-group">
                            <?= Html::a('<span class="glyphicon glyphicon-arrow-left"></span>', ['move-photo-up', 'id' => $model->id, 'photo_id' => $photo->id], [
                                'class' => 'btn btn-default',
                                'data-method' => 'post',
                            ]) ?>
                            <?= Html::a('<span class="glyphicon glyphicon-remove"></span>', ['delete-photo', 'id' => $model->id, 'photo_id' => $photo->id], [
                                'class' => 'btn btn-default',
                                'data-method' => 'post',
                                'data-confirm' => 'Remove photo?',
                            ]) ?>
                            <?= Html::a('<span class="glyphicon glyphicon-arrow-right"></span>', ['move-photo-down', 'id' => $model->id, 'photo_id' => $photo->id], [
                                'class' => 'btn btn-default',
                                'data-method' => 'post',
                            ]) ?>
                        </div>
                        <div>
                            <?= Html::a(
                                Html::img($photo->getThumbFileUrl('file', 'thumb')),
                                $photo->getUploadedFileUrl('file'),
                                ['class' => 'thumbnail', 'target' => '_blank']
                            ) ?>
                        </div>
                    </div>
                <?php endforeach; ?>
            </div>

            <?php $form = ActiveForm::begin([
                'options' => ['enctype'=>'multipart/form-data'],
            ]); ?>

            <?= $form->field($photosForm, 'files[]')->label(false)->widget(FileInput::class, [
                'options' => [
                    'accept' => 'image/*',
                    'multiple' => true,
                ]
            ]) ?>

            <div class="form-group">
                <?= Html::submitButton('Yuklash', ['class' => 'btn btn-success']) ?>
            </div>

            <?php ActiveForm::end(); ?>

        </div>
    </div>

</div>
