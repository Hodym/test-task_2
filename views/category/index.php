<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = Yii::t('control', 'Categories');
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="category-index">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a(Yii::t('control', 'Create Category'), ['create'], ['class' => 'btn btn-success']) ?>
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
            ],
            [
                'attribute'=>'updated_at',
                'format' => ['date', 'php:Y.m.d H:i:s'],
            ],

            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>


</div>
