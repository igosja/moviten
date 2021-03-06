<?php

namespace frontend\models;

use Yii;
use yii\base\Model;

class ContactForm extends Model
{
    public $name;
    public $phone;
    public $email;
    public $text;

    public function rules()
    {
        return [
            [['name', 'phone', 'text'], 'required'],
            [['email'], 'email'],
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
            ->setSubject('Заказ обратной связи с сайта Мовитен')
            ->setTextBody($this->text)
            ->send();
    }
}
