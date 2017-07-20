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

    public function attributeLabels()
    {
        return [
            'address_1' => 'Адрес (строка 1)',
            'address_2' => 'Адрес (строка 2)',
            'address_3' => 'Адрес (строка 3)',
            'email' => 'Email',
            'google_lat' => 'Первая координата Google карты',
            'google_lng' => 'Вторая координата Google карты',
            'h1' => 'Заголовок',
            'phone_1' => 'Телефон 1',
            'phone_2' => 'Телефон 2',
            'shedule_mn' => 'Часы работы в будние',
            'shedule_sn' => 'Часы работы в субботу',
            'shedule_st' => 'Часы работы в воскресенье',
            'seo_description' => 'SEO description',
            'seo_keywords' => 'SEO keywords',
            'seo_title' => 'SEO title',
        ];
    }
}