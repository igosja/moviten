<?php

namespace common\models;

use yii\db\ActiveRecord;

class Portfolio extends ActiveRecord
{
    public static function tableName()
    {
        return '{{%portfolio}}';
    }

    public function rules()
    {
        return [
            [['h1', 'portfoliocategory_id', 'text'], 'required'],
            [['h1', 'url', 'seo_title'], 'string', 'max' => 255],
            [['url'], 'unique'],
            [['portfoliocategory_id', 'status'], 'integer'],
            [['text', 'seo_description', 'seo_keywords'], 'safe'],
        ];
    }

    public function beforeSave($insert)
    {
        if (parent::beforeSave($insert)) {
            if (!$this['url']) {
                $translate = new Translate();
                $this['url'] = str_replace($translate->rus, $translate->lat, $this['h1']);
            }
            $this['url'] = str_replace(' ', '-', $this['url']);
            $this['url'] = strtolower($this['url']);
            return true;
        } else {
            return false;
        }
    }

    public function getPortfoliocategory()
    {
        return $this->hasOne(PortfolioCategory::className(), ['id' => 'portfoliocategory_id']);
    }
}