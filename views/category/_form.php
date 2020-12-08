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

    <div class="form-group">
        <?= Html::submitButton(Yii::t('control', 'Save'), ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
