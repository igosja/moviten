<?php

namespace common\models;

use yii\db\ActiveRecord;

class PortfolioImage extends ActiveRecord
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

    public function attributeLabels()
    {
        return [
            'image_id' => 'Изображение',
            'portfolio_id' => 'Портфолио',
            'order' => 'Сортировка',
            'status' => 'Статус',
        ];
    }

    public function getImage()
    {
        return $this->hasOne(Image::className(), ['id' => 'image_id']);
    }
}