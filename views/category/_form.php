<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\Category */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="category-form">

    <?php $form = ActiveForm::begin(); ?>

    <div class="row">
        <div class="col-sm-6">
            <h3><?= Yii::t('control', 'Russian translation') ?></h3>
            <?= $form->field($model, 'name')->textInput(['maxlength' => 256])->label(Yii::t('control', 'Name')) ?>
            <?= $form->field($model, 'description')->textInput()->label(Yii::t('control', 'Description')) ?>
        </div>
        <div class="col-sm-6">
            <h3><?= Yii::t('control', 'English translation') ?></h3>
             <?= $form->field($model, 'name_en')->textInput(['maxlength' => 256])->label(Yii::t('control', 'Name').' En') ?>
             <?= $form->field($model, 'description_en')->textInput()->label(Yii::t('control', 'Description').' En') ?>
        </div>
    </div>

    <div class="form-group">
        <?= Html::submitButton(Yii::t('control', 'Save'), ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
