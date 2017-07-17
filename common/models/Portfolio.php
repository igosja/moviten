<?php

namespace common\models;

use yii\db\ActiveRecord;
use yii\web\UploadedFile;

class Portfolio extends ActiveRecord
{
    /**
     * @var UploadedFile[] file attribute
     */
    public $upload_image;

    public static function tableName()
    {
        return '{{%portfolio}}';
    }

    public function rules()
    {
        return [
            [['h1', 'portfoliocategory_id', 'text'], 'required'],
            [['h1', 'url', 'seo_title'], 'string', 'max' => 255],
            [['url'], 'unique'],
            [['portfoliocategory_id', 'status'], 'integer'],
            [['text', 'seo_description', 'seo_keywords'], 'safe'],
            [['upload_image'], 'file', 'extensions' => 'png, jpg, jpeg, gif', 'maxFiles' => 10],
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
            return true;
        } else {
            return false;
        }
    }

    public function getPortfoliocategory()
    {
        return $this->hasOne(PortfolioCategory::className(), ['id' => 'portfoliocategory_id']);
    }

    public function getImage()
    {
        return $this->hasMany(PortfolioImage::className(), ['image_id' => 'id']);
    }

    /**
     * Сохраняет загруженные файлы и делает записи в БД
     */
    public function upload()
    {
        foreach ($this->upload_image as $file) {
            $file_name = substr(md5(uniqid()), -20) . '.' . $file->extension;
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
            if ($file->saveAs($upload_dir . '/' . $file_name)) {
                chmod($upload_url, 0777);
            }
            $o_image = new Image();
            $o_image['url'] = $file_url;
            $o_image->save();
            $o_profile_image = new PortfolioImage();
            $o_profile_image['image_id'] = $o_image->primaryKey;
            $o_profile_image['portfolio_id'] = $this->primaryKey;
            $max_order = PortfolioImage::find()->where(['portfolio_id' => $this->primaryKey])->orderBy( '`order` DESC')->one();
            if ($max_order) {
                $max_order = $max_order['order'] + 1;
            } else {
                $max_order = 0;
            }
            $o_profile_image['order'] = $max_order;
            $o_profile_image->save();
        }
    }
}