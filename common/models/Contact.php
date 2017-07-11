<?php

namespace common\models;

use yii\db\ActiveRecord;

class Contact extends ActiveRecord
{
    public static function tableName()
    {
        return '{{%contact}}';
    }

    public function rules()
    {
        return [
            [['address_1', 'address_2', 'address_3', 'h1', 'seo_title'], 'string', 'max' => 255],
            [['phone_1', 'phone_2', 'shedule_mn', 'shedule_sn', 'shedule_st'], 'string', 'max' => 20],
            [['email'], 'email'],
            [['google_lat', 'google_lng'], 'number'],
            [['seo_description', 'seo_keywords'], 'safe'],
        ];
    }
}