<?php

namespace frontend\models;

use Yii;
use yii\base\Model;

class OrderForm extends Model
{
    public $name;
    public $phone;
    public $email;
    public $text;

    public function rules()
    {
        return [
            [['name', 'phone'], 'required'],
            [['email'], 'email'],
            [['text'], 'safe'],
        ];
    }

    public function attributeLabels()
    {
        return [
            'name' => 'Имя',
            'phone' => 'Телефон',
            'email' => 'Email',
            'text' => 'Текст',
        ];
    }

    public function sendEmail($email)
    {
        if (!$this->email) {
            $this->email = 'office@moviten.com.ua';
        }

        return Yii::$app->mailer->compose()
            ->setTo($email)
            ->setFrom([$this->email => $this->name])
            ->setSubject('Заказ услуги с сайта Мовитен')
            ->setTextBody($this->text)
            ->send();
    }
}
