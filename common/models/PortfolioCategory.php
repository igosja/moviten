<?php

namespace common\models;

use yii\db\ActiveRecord;

class PortfolioCategory extends ActiveRecord
{
    public static function tableName()
    {
        return '{{%portfoliocategory}}';
    }

    public function rules()
    {
        return [
            [['h1'], 'required'],
            [['h1', 'url', 'seo_title'], 'string', 'max' => 255],
            [['url'], 'unique'],
            [['status', 'order'], 'integer'],
            [['seo_description', 'seo_keywords'], 'safe'],
        ];
    }

    public function attributeLabels()
    {
        return [
            'h1' => 'Заголовок',
            'url' => 'ЧПУ',
            'order' => 'Сортировка',
            'status' => 'Статус',
            'seo_description' => 'SEO description',
            'seo_keywords' => 'SEO keywords',
            'seo_title' => 'SEO title',
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
            if ($this->isNewRecord) {
                $max_order = self::find()->orderBy('`order` DESC')->one();
                if ($max_order) {
                    $max_order = $max_order['order'] + 1;
                } else {
                    $max_order = 0;
                }
                $this['order'] = $max_order;
            }
            return true;
        } else {
            return false;
        }
    }
}