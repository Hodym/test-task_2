<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model app\models\Product */

$this->title = Yii::$app->language === 'ru' ? $model->name : $model->name_en;
$this->params['breadcrumbs'][] = ['label' => Yii::t('control', 'Products'), 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
\yii\web\YiiAsset::register($this);
?>
<div class="product-view">

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
            Yii::$app->language === 'ru' ? 'name' : 'name_en',
            Yii::$app->language === 'ru' ? 'description' : 'description_en',
            [
                'attribute'=>'category_id',
                'label'=>'Category',
                'value'=> $model->categoryName,
            ],
            [
                'attribute'=>'filename',
                'value'=> $model->image,
                'format'=>'image',
            ],
            'price',
        ],
    ]) ?>

</div>
