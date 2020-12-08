<?php

namespace app\models;

use Yii;
use yii\db\ActiveRecord;
use omgdef\multilingual\MultilingualQuery;


/**
 * This is the model class for table "lang_product".
 *
 * @property int $id
 * @property string $name
 * @property string $description
 * @property string $lang
 * @property int|null $product_id
 *
 * @property Product $product
 */
class LangProduct extends ActiveRecord
{
    
    public static function find()
    {
        return new MultilingualQuery(get_called_class());
    }
    
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'lang_product';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['name', 'description', 'lang'], 'required'],
            [['description'], 'string'],
            [['product_id'], 'integer'],
            [['name'], 'string', 'max' => 256],
            [['lang'], 'string', 'max' => 32],
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
            'name' => Yii::t('models', 'Name'),
            'description' => Yii::t('models', 'Description'),
            'lang' => Yii::t('models', 'Lang'),
            'product_id' => Yii::t('models', 'Product ID'),
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
