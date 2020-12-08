<?php

namespace app\models;

use Yii;
use yii\db\ActiveRecord;
use omgdef\multilingual\MultilingualBehavior;
use app\models\LangProduct;
use omgdef\multilingual\MultilingualQuery;
use yii\web\UploadedFile;
use yii\helpers\Url;

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
    public $file;

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
            [['name', 'name_en', 'description', 'description_en', 'price', 'category_id'], 'required'],
            [['name', 'name_en', 'description', 'description_en', 'categoryName'], 'safe'],
            [['price'], 'number'],
            [['category_id'], 'integer'],
            [['filename'], 'string', 'max' => 255],
            [['file'], 'image'],
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
            'filename' => Yii::t('models', 'Photo'),
            'file' => Yii::t('models', 'Photosrc'),
            'price' => Yii::t('control', 'Price'),
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
    
    public function getSmallImage() {
        if($this->filename){
            $path = Url::home(true).'/uploads/images/product/50x50/'.$this->filename;
        } else {
            $path = Url::home(true).'/uploads/images/product/50x50/noimage.jpg';
        }
        return $path;
    }
    
    public function getImage() {
        if($this->filename){
            $path = Url::home(true).'/uploads/images/product/800x/'.$this->filename;
        } else {
            $path = Url::home(true).'/uploads/images/product/800x/noimage.jpg';
        }
        return $path;
    }
    
    public function beforeSave($insert)
    {
        if (!parent::beforeSave($insert)) {
         return false;
        }

        if ($file = UploadedFile::getInstance($this, 'file')) {
            $dir = Yii::getAlias('@images') . '/product/';
            if ($this->filename) {
                if (file_exists($dir . $this->filename)) {
                    unlink($dir . $this->filename);
                }
                if (file_exists($dir . '50x50/' . $this->filename)) {
                    unlink($dir . '50x50/' . $this->filename);
                }
                if (file_exists($dir . '800x/' . $this->filename)) {
                    unlink($dir . '800x/' . $this->filename);
                }
            }
            $this->filename = strtotime('now') . '_' . Yii::$app->getSecurity()->generateRandomString(5) . '.' . $file->extension;
            $file->saveAs($dir . $this->filename);
            $imag = Yii::$app->image->load($dir . $this->filename);
            $imag->background('#fff', 0);
            $imag->resize('50', '50', Yii\image\drivers\Image::INVERSE);
            $imag->crop('50', '50');
            $imag->save($dir . '50x50/' . $this->filename, 90);
            $imag = Yii::$app->image->load($dir . $this->filename);
            $imag->background('#fff', 0);
            $imag->resize('800', null, Yii\image\drivers\Image::INVERSE);
            $imag->save($dir . '800x/' . $this->filename, 90);
        }
        return true;
    }
}
