<?php

namespace common\models;

use yii\db\ActiveRecord;

class PotfolioCategory extends ActiveRecord
{
    public static function tableName()
    {
        return '{{%portfoliocategory}}';
    }

    public function rules()
    {
        return [
            [['h1', 'url', 'seo_title'], 'string', 'max' => 255],
            [['status', 'order'], 'integer'],
            [['seo_description', 'seo_keywords'], 'safe'],
        ];
    }
}