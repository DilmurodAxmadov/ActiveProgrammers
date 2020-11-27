<?php

use kartik\file\FileInput;
use yii\helpers\Html;
use yii\jui\DatePicker;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model backend\models\Trees */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="trees-form">

    <?php $form = ActiveForm::begin(); ?>

    <div class="row">
        <div class="col-sm-4">
            <?= $form->field($model, 'name_ru')->textInput(['maxlength' => true]) ?>
        </div>
        <div class="col-sm-2">
            <?= $form->field($model, 'girth')->textInput() ?>
        </div>
        <div class="col-sm-2">
            <?php
            $model->planted_at = $model->isNewRecord ? time() : $model->planted_at;
            echo $form->field($model, 'planted_at')->widget(DatePicker::class, [
                'dateFormat' => 'd.MM.yyyy',
                'clientOptions' => [
                    'showButtonPanel' => true,
                    'changeYear' => true,
                    'defaultDate' => date('d-m-Y')
                ],
                'options' => ['class' => 'form-control']
            ]) ?>
        </div>
        <div class="col-sm-2">
            <?= $form->field($model, 'latitude')->textInput(['maxlength' => true]) ?>
        </div>
        <div class="col-sm-2">
            <?= $form->field($model, 'longitude')->textInput(['maxlength' => true]) ?>
        </div>
    </div>

    <div class="row">
        <div class="col-sm-4">
            <?= $form->field($model, 'description_ru')->textarea(['rows' => 17]) ?>
        </div>
        <div class="col-sm-4">
            <?= $form->field($model, 'special_signs_ru')->textarea(['rows' => 17]) ?>
        </div>
        <div class="col-sm-4">
            <?= $form->field($model, 'main_photo_id')->widget(FileInput::class, [
                'options' => ['accept' => 'image/*'],
                'language' => Yii::$app->language,
                'pluginOptions' => [
                    'showCaption' => false,
                    'showRemove' => false,
                    'showUpload' => false,
                    'browseClass' => 'btn btn-primary btn-block',
                    'browseLabel' => 'Рисунок',
                    'layoutTemplates' => [
                        'main1' => '<div class="kv-upload-progress hide"></div>{remove}{cancel}{upload}{browse}{preview}',
                    ],
//                    'initialPreview' => [
//                        Html::img($model->getThumbFileUrl('main_photo_id', 'admin'), ['class' => 'file-preview-image', 'alt' => '', 'title' => '']),
//                    ],
                ],
            ]);
            ?><?php //= $form->field($model, 'main_photo_id')->textInput() ?>
        </div>
    </div>

    <div class="form-group">
        <?= Html::submitButton(Yii::t('app', 'Save'), ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
