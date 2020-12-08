<?php

namespace app\models;

use Yii;
use yii\db\ActiveRecord;
use omgdef\multilingual\MultilingualQuery;

/**
 * This is the model class for table "lang_category".
 *
 * @property int $id
 * @property string $name
 * @property string $description
 * @property string $lang
 * @property int|null $category_id
 *
 * @property Category $category
 */
class LangCategory extends ActiveRecord
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
        return 'lang_category';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['name', 'description', 'lang'], 'required'],
            [['description'], 'string'],
            [['category_id'], 'integer'],
            [['name'], 'string', 'max' => 256],
            [['lang'], 'string', 'max' => 32],
            [['category_id'], 'exist', 'skipOnError' => true, 'targetClass' => Category::className(), 'targetAttribute' => ['category_id' => 'id']],
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
            'category_id' => Yii::t('models', 'Category ID'),
        ];
    }

    /**
     * Gets query for [[Category]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getCategory()
    {
        return $this->hasOne(Category::className(), ['id' => 'category_id']);
    }
}
