<?php

namespace common\models;

use yii\db\ActiveRecord;

class PagePortfolio extends ActiveRecord
{
    public static function tableName()
    {
        return '{{%pageportfolio}}';
    }

    public function rules()
    {
        return [
            [['h1', 'seo_title'], 'string', 'max' => 255],
            [['seo_description', 'seo_keywords'], 'safe'],
        ];
    }

    public function attributeLabels()
    {
        return [
            'h1' => 'Заголовок',
            'seo_description' => 'SEO description',
            'seo_keywords' => 'SEO keywords',
            'seo_title' => 'SEO title',
        ];
    }
}