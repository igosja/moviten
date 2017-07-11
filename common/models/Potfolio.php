<?php

namespace common\models;

use yii\db\ActiveRecord;

class Potfolio extends ActiveRecord
{
    public static function tableName()
    {
        return '{{%portfolio}}';
    }

    public function rules()
    {
        return [
            [['h1', 'url', 'seo_title'], 'string', 'max' => 255],
            [['portfoliocategory_id', 'status'], 'integer'],
            [['text', 'seo_description', 'seo_keywords'], 'safe'],
        ];
    }
}