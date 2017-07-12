<?php

namespace common\models;

use yii\db\ActiveRecord;

class PortfolioCategory extends ActiveRecord
{
    public $rus = array('А', 'Б', 'В', 'Г', 'Д', 'Е', 'Є', 'Ё',  'Ж', 'З', 'И', 'І', 'Ї', 'Й', 'К', 'Л', 'М', 'Н', 'О', 'П', 'Р', 'С', 'Т', 'У', 'Ф', 'Х', 'Ц',  'Ч',  'Ш',   'Щ', 'Ъ', 'Ы', 'Ь', 'Э',  'Ю',  'Я', 'а', 'б', 'в', 'г', 'д', 'е', 'є', 'ё',  'ж', 'з', 'и', 'і', 'ї', 'й', 'к', 'л', 'м', 'н', 'о', 'п', 'р', 'с', 'т', 'у', 'ф', 'х', 'ц',  'ч',  'ш',   'щ', 'ъ', 'ы', 'ь', 'э',  'ю',  'я', ' ', '(', ')', ',', '.', ':', ';', '"', "'", '!', '@', '#', '$', '%', '^', '&', '*', '-', '=', '+', '<', '>', '\\', '|', '№', '/', '`', '~');
    public $lat = array('a', 'b', 'v', 'g', 'd', 'e', 'e', 'e', 'gh', 'z', 'i', 'i', 'i', 'y', 'k', 'l', 'm', 'n', 'o', 'p', 'r', 's', 't', 'u', 'f', 'h', 'c', 'ch', 'sh', 'sch', 'y', 'y', 'y', 'e', 'yu', 'ya', 'a', 'b', 'v', 'g', 'd', 'e', 'e', 'e', 'gh', 'z', 'i', 'i', 'i', 'y', 'k', 'l', 'm', 'n', 'o', 'p', 'r', 's', 't', 'u', 'f', 'h', 'c', 'ch', 'sh', 'sch', 'y', 'y', 'y', 'e', 'yu', 'ya', '_',  '',  '',  '',  '',  '',  '',  '',  '',  '',  '',  '',  '',  '',  '',  '',  '',  '',  '',  '',  '',  '',   '',  '',  '',  '',  '',  '');

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

    public function beforeSave($insert)
    {
        if (parent::beforeSave($insert)) {
            if (!$this['url']) {
                $this['url'] = str_replace($this->rus, $this->lat, $this['h1']);
            } else {
                $this['url'] = preg_replace('/[^\'\p{L} ]/iu', '', $this['url']);
            }
            $this['url'] = str_replace(' ', '-', $this['url']);
            $this['url'] = strtolower($this['url']);
            if ($this->isNewRecord){
                $max_order = self::find()->orderBy( '`order` DESC')->one();
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