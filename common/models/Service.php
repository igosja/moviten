<?php

namespace common\models;

use yii\db\ActiveRecord;

class Service extends ActiveRecord
{
    public static function tableName()
    {
        return '{{%service}}';
    }

    public function rules()
    {
        return [
            [['h1', 'url', 'seo_title'], 'string', 'max' => 255],
            [['image_id', 'order', 'status'], 'integer'],
            [['text', 'seo_description', 'seo_keywords'], 'safe'],
        ];
    }
}