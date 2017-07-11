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
            [['text', 'text_3', 'seo_description', 'seo_keywords'], 'safe'],
        ];
    }
}