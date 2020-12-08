<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use app\models\Category;

/* @var $this yii\web\View */
/* @var $model app\models\Product */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="product-form">

    <?php $form = ActiveForm::begin([
        'options' => ['enctype'=> 'multipart/form-data'],
    ]); ?>

    <div class="row">
        <div class="col-sm-6">
            <h3>Русский перевод</h3>
            <?= $form->field($model, 'name')->textInput(['maxlength' => 256]) ?>
            <?= $form->field($model, 'description')->textInput() ?>
        </div>
        <div class="col-sm-6">
            <h3>English version</h3>
             <?= $form->field($model, 'name_en')->textInput(['maxlength' => 256]) ?>
             <?= $form->field($model, 'description_en')->textInput() ?>
        </div>
    </div>
    
    <?= $form->field($model, 'category_id')->dropDownList(Category::getList()) ?>
    
    <?= $form->field($model, 'file',['options'=>['class'=>'col-xs-12']])->widget(\kartik\file\FileInput::classname(), [
        'options' => ['accept' => 'image/*'],
        'pluginOptions' => [
            'showCaption' => false,
            'showRemove' => false,
            'showUpload' => false,
            'browseClass' => 'btn btn-primary btn-block',
            'browseIcon' => '<i class="glyphicon glyphicon-camera"></i> ',
            'browseLabel' =>  'Select Photo'
        ],
    ]);?>

    <?= $form->field($model, 'price')->textInput() ?>

    <div class="form-group">
        <?= Html::submitButton(Yii::t('control', 'Save'), ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
