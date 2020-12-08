<?php

namespace app\models;

use Yii;
use yii\db\ActiveRecord;
use yii\behaviors\TimestampBehavior;

/**
 * This is the model class for table "feedback".
 *
 * @property int $id
 * @property int $created_at
 * @property int $updated_at
 * @property int $product_id
 * @property string $username
 * @property string $email
 * @property string $reviews
 *
 * @property Product $product
 */
class Feedback extends ActiveRecord
{
    public function behaviors()
    {
        return [
            [
                'class' => TimestampBehavior::className(),
                'attributes' => [
                    ActiveRecord::EVENT_BEFORE_INSERT => ['created_at', 'updated_at'],
                    ActiveRecord::EVENT_BEFORE_UPDATE => ['updated_at'],
                ],
                // если вместо метки времени UNIX используется datetime:
                // 'value' => new Expression('NOW()'),
            ],
        ];
    }
    
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'feedback';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['product_id', 'username', 'email', 'reviews'], 'required'],
            [['created_at', 'updated_at', 'product_id'], 'integer'],
            [['reviews'], 'string'],
            [['username'], 'string', 'max' => 32],
            [['email'], 'string', 'max' => 255],
            [['email'], 'email'],
            [['product_id'], 'exist', 'skipOnError' => true, 'targetClass' => Product::className(), 'targetAttribute' => ['product_id' => 'id']],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => Yii::t('models', 'ID'),
            //'created_at' => Yii::t('models', 'Created At'),
            //'updated_at' => Yii::t('models', 'Updated At'),
            //'product_id' => Yii::t('models', 'Product ID'),
            'username' => Yii::t('models', 'Username'),
            'email' => Yii::t('models', 'Email'),
            'reviews' => Yii::t('models', 'Reviews'),
        ];
    }

    /**
     * Gets query for [[Product]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getProduct()
    {
        return $this->hasOne(Product::className(), ['id' => 'product_id']);
    }
}
