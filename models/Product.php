<?php

namespace app\models;

use Yii;
use yii\db\ActiveRecord;
use omgdef\multilingual\MultilingualBehavior;
use app\models\LangProduct;
use omgdef\multilingual\MultilingualQuery;

/**
 * This is the model class for table "product".
 *
 * @property int $id
 * @property string $filename
 * @property float $price
 * @property int $category_id
 *
 * @property Feedback[] $feedbacks
 * @property LangProduct[] $langProducts
 * @property Category $category
 */
class Product extends ActiveRecord
{

    public function behaviors()
    {
        return [
            'ml' => [
                'class' => MultilingualBehavior::className(),
                'languages' => ['ru', 'en'],
                'languageField' => 'lang',
                //'localizedPrefix' => '',
                'requireTranslations' => true,
                //'dynamicLangClass' => true',
                'langClassName' => LangProduct::className(), // or namespace/for/a/class/PostLang
                'defaultLanguage' => 'ru',
                'langForeignKey' => 'product_id',
                'tableName' => "{{%lang_product}}",
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
    
    public static function tableName()
    {
        return 'product';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['filename', 'price', 'category_id'], 'required'],
            [['name', 'name_en', 'description', 'description_en', 'categoryName'], 'safe'],
            [['price'], 'number'],
            [['category_id'], 'integer'],
            [['filename'], 'string', 'max' => 255],
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
            'filename' => Yii::t('models', 'Filename'),
            'price' => Yii::t('models', 'Price'),
            'category_id' => Yii::t('models', 'Category ID'),
        ];
    }

    /**
     * Gets query for [[Feedbacks]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getFeedbacks()
    {
        return $this->hasMany(Feedback::className(), ['product_id' => 'id']);
    }

    /**
     * Gets query for [[LangProducts]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getLangProducts()
    {
        return $this->hasMany(LangProduct::className(), ['product_id' => 'id']);
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
    
    public function getCategoryName() {
        return (isset($this->category) ? $this->category->name : ' не задана');
    }
}
