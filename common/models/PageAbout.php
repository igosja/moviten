<?php

namespace common\models;

use yii\db\ActiveRecord;

class PageAbout extends ActiveRecord
{
    public static function tableName()
    {
        return '{{%pageabout}}';
    }

    public function rules()
    {
        return [
            [['image_id', 'team_1', 'team_2', 'team_3', 'team_4'], 'integer'],
            [['h1', 'h2', 'h3_1', 'h3_2', 'seo_title'], 'string', 'max' => 255],
            [['text_1', 'text_2', 'text_3', 'seo_description', 'seo_keywords'], 'safe'],
        ];
    }
}