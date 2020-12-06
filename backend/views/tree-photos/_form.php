<?php

use backend\models\Trees;
use kartik\file\FileInput;
use yii\helpers\ArrayHelper;
use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model backend\models\TreePhotos */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="tree-photos-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'tree_id')->dropDownList(ArrayHelper::map(Trees::find()->all(),'id','name_' . Yii::$app->language), ['prompt' => '- - -']) ?>

    <?= $form->field($model, 'file')->widget(FileInput::class, [
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
    ?>

    <?= $form->field($model, 'sort')->textInput() ?>

    <?= $form->field($model, 'status')->textInput() ?>

    <div class="form-group">
        <?= Html::submitButton(Yii::t('app', 'Save'), ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
