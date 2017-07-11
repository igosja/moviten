<?php

namespace common\models;

use yii\db\ActiveRecord;

class PageService extends ActiveRecord
{
    public static function tableName()
    {
        return '{{%pageservice}}';
    }

    public function rules()
    {
        return [
            [['h1', 'seo_title'], 'string', 'max' => 255],
            [['text', 'seo_description', 'seo_keywords'], 'safe'],
        ];
    }
}