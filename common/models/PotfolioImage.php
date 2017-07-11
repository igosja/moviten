<?php

namespace common\models;

use yii\db\ActiveRecord;

class PotfolioImage extends ActiveRecord
{
    public static function tableName()
    {
        return '{{%portfolioimage}}';
    }

    public function rules()
    {
        return [
            [['image_id', 'portfolio_id', 'status', 'order'], 'integer'],
        ];
    }
}