<?php

namespace common\models;

use yii\db\ActiveRecord;

class Slide extends ActiveRecord
{
    public static function tableName()
    {
        return '{{%slide}}';
    }

    public function rules()
    {
        return [
            [['image_id', 'status', 'order'], 'integer'],
        ];
    }
}