<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model app\models\Category */

$this->title = Yii::$app->language === 'ru' ? $model->name : $model->name_en;
$this->params['breadcrumbs'][] = ['label' => Yii::t('control', 'Categories'), 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
\yii\web\YiiAsset::register($this);
?>
<div class="category-view">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a(Yii::t('control', 'Update'), ['update', 'id' => $model->id], ['class' => 'btn btn-primary']) ?>
        <?= Html::a(Yii::t('control', 'Delete'), ['delete', 'id' => $model->id], [
            'class' => 'btn btn-danger',
            'data' => [
                'confirm' => Yii::t('control', 'Are you sure you want to delete this item?'),
                'method' => 'post',
            ],
        ]) ?>
    </p>

    <?= DetailView::widget([
        'model' => $model,
        'attributes' => [
            'id',
            Yii::$app->language === 'ru' ? 
            [
                'attribute'=>'name',
                'label' => Yii::t('control', 'Name'),
            ]
            : 
            [
                'attribute'=>'name_en',
                'label' => Yii::t('control', 'Name'),
            ],
            Yii::$app->language === 'ru' ? 
            [
                'attribute'=>'description',
                'label' => Yii::t('control', 'Description'),
            ]
            :
            [
                'attribute'=>'description_en',
                'label' => Yii::t('control', 'Description'),
            ],
            [
                'attribute'=>'updated_at',
                'format' => ['date', 'php:Y.m.d H:i:s'],
            ]
        ],
    ]) ?>

</div>
