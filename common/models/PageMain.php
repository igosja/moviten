<?php

namespace common\models;

use yii\db\ActiveRecord;

class PageMain extends ActiveRecord
{
    public static function tableName()
    {
        return '{{%pagemain}}';
    }

    public function rules()
    {
        return [
            [['seo_title'], 'string', 'max' => 255],
            [['text', 'seo_description', 'seo_keywords'], 'safe'],
        ];
    }

    public function attributeLabels()
    {
        return [
            'text' => 'Текст',
            'seo_description' => 'SEO description',
            'seo_keywords' => 'SEO keywords',
            'seo_title' => 'SEO title',
        ];
    }
}