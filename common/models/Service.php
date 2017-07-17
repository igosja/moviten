<?php

namespace common\models;

use yii\db\ActiveRecord;
use yii\web\UploadedFile;

class Service extends ActiveRecord
{
    /**
     * @var UploadedFile file attribute
     */
    public $upload_image;

    public static function tableName()
    {
        return '{{%service}}';
    }

    public function rules()
    {
        return [
            [['h1', 'text'], 'required'],
            [['h1', 'url', 'seo_title'], 'string', 'max' => 255],
            [['url'], 'unique'],
            [['image_id', 'order', 'status'], 'integer'],
            [['text', 'seo_description', 'seo_keywords'], 'safe'],
            [['upload_image'], 'image', 'extensions' => 'png, jpg, jpeg, gif'],
        ];
    }

    public function attributeLabels()
    {
        return [
            'h1' => 'Название',
            'image_id' => 'Изображение',
            'order' => 'Сортировка',
            'status' => 'Статус',
            'text' => 'Текст',
            'upload_image' => 'Изображение',
            'url' => 'ЧПУ',
            'seo_description' => 'SEO description',
            'seo_keywords' => 'SEO keywords',
            'seo_title' => 'SEO title',
        ];
    }

    public function beforeSave($insert)
    {
        if (parent::beforeSave($insert)) {
            if (!$this['url']) {
                $translate = new Translate();
                $this['url'] = str_replace($translate->rus, $translate->lat, $this['h1']);
            }
            $this['url'] = str_replace(' ', '-', $this['url']);
            $this['url'] = strtolower($this['url']);
            if ($this->isNewRecord){
                $max_order = self::find()->orderBy( '`order` DESC')->one();
                if ($max_order) {
                    $max_order = $max_order['order'] + 1;
                } else {
                    $max_order = 0;
                }
                $this['order'] = $max_order;
            }
            return true;
        } else {
            return false;
        }
    }

    public function getImage()
    {
        return $this->hasOne(Image::className(), ['id' => 'image_id']);
    }

    /**
     * Сохраняет загруженный файл и делает запись в БД
     * @return integer image_id
     */
    public function upload()
    {
        $file_name = substr(md5(uniqid()), -20) . '.' . $this->upload_image->extension;
        $path = array();
        $path[] = substr(md5(uniqid(rand(), 1)), -3);
        $path[] = substr(md5(uniqid(rand(), 1)), -3);
        $path[] = substr(md5(uniqid(rand(), 1)), -3);
        $upload_dir = $_SERVER['DOCUMENT_ROOT'] . '/frontend/web/upload/' . implode('/', $path);
        if (!is_dir($upload_dir)) {
            mkdir($upload_dir, 0777, 1);
        }
        $upload_url = $upload_dir . '/' . $file_name;
        $file_url = '/upload/' . implode('/', $path) . '/' . $file_name;
        if ($this->upload_image->saveAs($upload_dir . '/' . $file_name)) {
            chmod($upload_url, 0777);
        }
        $o_image = new Image();
        $o_image['url'] = $file_url;
        $o_image->save();
        return $o_image->primaryKey;
    }
}