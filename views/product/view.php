<?php

use yii\helpers\Html;
use yii\widgets\DetailView;
use yii\bootstrap\Modal;
use yii\widgets\LinkPager;
use yii\widgets\ActiveForm;
use yii\helpers\Url;

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
                'attribute'=>'category_id',
                'label'=>Yii::t('control', 'Category'),
                'value'=> $model->categoryName,
            ],
            [
                'attribute'=>'filename',
                'label' => Yii::t('control', 'Photo'),
                'value'=> $model->image,
                'format'=>'image',
            ],
            'price',
        ],
    ]) ?>
    
    <?php
        Modal::begin([
            'header' => '<h2>'.Yii::t('control', 'Write Your Comment').'</h2>',
            'toggleButton' => [
                'label' => Yii::t('control', 'Write Your Comment'),
                'tag' => 'button',
                'class' => 'btn btn-primary btn-lg btn-block',
            ],
            'footer' => null,
        ]);
    ?>

        <?php $form = ActiveForm::begin(); ?>
            <span>
            <?= $form->field($commentForm, 'username')->textInput([
                    'placeholder' => Yii::t('control', 'Your Name'),
                    'value' => $userData['name'],
                    ])->label(false)?>
            <?= $form->field($commentForm, 'email')->textInput([
                    'placeholder' => Yii::t('control', 'Email Address'),
                    'value' => $userData['email'],
                    ])->label(false)?>
            </span>
        <?= $form->field($commentForm, 'reviews')->textarea(['placeholder' => Yii::t('control', 'Write Message')])->label(false) ?>

        <?= Html::submitButton(Yii::t('control', 'Submit'), ['class' => 'btn btn-primary pull-right']) ?><br>

        <?php ActiveForm::end(); ?><br>
    
    <?php Modal::end(); ?>
    
    <div class="container">
        <div class="comments">
            <h3 class="title-comments"><?= Yii::t('control', 'Comments') ?> (<?= $pages->totalCount ?>)</h3>
            <ul class="media-list">
                
                <?php if (!empty($comments)): ?>
                    <?php $i = 0; foreach ($comments as $comment): ?>
                        <li class="media">
                            <div class="media-left">
                                <a href="#">
                                    <img class="media-object img-rounded" src=<?= Url::home(true).'/uploads/images/avatar1.jpg' ?> alt="...">
                                </a>
                            </div>
                            <div class="media-body">
                                <div class="panel panel-primary">
                                    <div class="panel-heading">
                                        <div class="author">
                                            <?= $comment->username ?>
                                            <a class="btn btn-primary pull-right btn-sm" href="<?= Url::to(['/feedback/update/', 'id'=>$comment->id])?>"><?= Yii::t('control', 'Update') ?></a>
                                        </div>
                                        <!--<div class="upd">
                                            <a class="btn btn-primary pull-right" href="<?php // Url::to(['/feedback/update/', 'id'=>$comment->id])?>"><?= Yii::t('control', 'Update') ?></a>
                                        </div>-->
                                        <div class="metadata">
                                            <span class="date"><?php echo date('d M Y, h:i A', $comment->created_at); //16 ноября 2015, 13:43 ?></span>
                                        </div>
                                    </div>
                                    <div class="panel-body">
                                        <div class="media-text text-justify"><?= $comment->reviews ?></div>
                                    </div>
                                    <!--<div class="panel-footer">
                                        <a class="btn btn-primary" href="#">Ответить</a>
                                    </div>-->
                                </div>
                            </div>
                        </li>
                        <?php $i++; if ($i % 3 == 0): ?>
                                <div class="clearfix"></div>
                        <?php endif; ?>
                    <?php endforeach; ?>
                <div class="clearfix"></div>
                <?php echo LinkPager::widget(['pagination' => $pages,]); ?>
                <?php else: ?>
                    <h2>Not comments...</h2>
                <?php endif; ?>
                            
            </ul>
        </div>
    </div>
    

</div>
