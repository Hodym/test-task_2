<?php

namespace app\models;

use Yii;
use yii\db\ActiveRecord;
use yii\behaviors\TimestampBehavior;
use omgdef\multilingual\MultilingualBehavior;
use omgdef\multilingual\MultilingualQuery;
use app\models\LangCategory;
use yii\helpers\ArrayHelper;

/**
 * This is the model class for table "category".
 *
 * @property int $id
 * @property int $created_at
 * @property int $updated_at
 *
 * @property LangCategory[] $langCategories
 * @property Product[] $products
 */
class Category extends ActiveRecord
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
            'ml' => [
                'class' => MultilingualBehavior::className(),
                'languages' => ['ru', 'en'],
                'languageField' => 'lang',
                //'localizedPrefix' => '',
                'requireTranslations' => true,
                //'dynamicLangClass' => true',
                'langClassName' => LangCategory::className(), // or namespace/for/a/class/PostLang
                'defaultLanguage' => 'ru',
                'langForeignKey' => 'category_id',
                'tableName' => "{{%lang_category}}",
                'attributes' => [
                    'name', 'description',
                ]
            ],
        ];
    }
    
    public static function find()
    {
        return new MultilingualQuery(get_called_class());
    }
    
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'category';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['created_at', 'updated_at'], 'safe'],
            [['name', 'name_en', 'description', 'description_en'], 'safe'],
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
            'updated_at' => Yii::t('models', 'Updated time'),
        ];
    }
    
    /**
     * Gets query for [[LangCategories]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getLangCategories()
    {
        return $this->hasMany(LangCategory::className(), ['category_id' => 'id']);
    }

    /**
     * Gets query for [[Products]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getProducts()
    {
        return $this->hasMany(Product::className(), ['category_id' => 'id']);
    }
    
    public static function getList() {
        return ArrayHelper::map(self::find()->all(), 'id', 'name');
    }
}
