<?php

use yii\helpers\Html;
use yii\grid\GridView;
use yii\helpers\StringHelper;

/* @var $this yii\web\View */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = Yii::t('control', 'Products');
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="product-index">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a(Yii::t('control', 'Create Product'), ['create'], ['class' => 'btn btn-success']) ?>
    </p>


    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'columns' => [
            //['class' => 'yii\grid\SerialColumn'],

            'id',
            [
                'attribute'=>'name',
                'label' => Yii::t('control', 'Name'),
            ],
            [
                'attribute'=>'description',
                'label' => Yii::t('control', 'Description'),
                'value' => function ($dataProvider) {
                    return StringHelper::truncate($dataProvider->description, 100);
                }
            ],
            [
                'attribute'=>'category_id',
                'label'=>Yii::t('control', 'Category'),
                'value'=> 'categoryName',
            ],
            [
                'attribute'=>'filename',
                'label' => Yii::t('control', 'Photo'),
                'value'=> 'smallImage',
                'format'=>'image',
            ],
            [
                'attribute'=>'price',
                'label'=>Yii::t('control', 'Price'),
            ],

            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>


</div>
