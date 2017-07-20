<?php

namespace frontend\controllers;

use common\models\Contact;
use yii\web\Controller;

class BaseController extends Controller
{
    public $contact;

    public function actions()
    {
        return [
            'error' => [
                'class' => 'yii\web\ErrorAction',
            ],
            'captcha' => [
                'class' => 'yii\captcha\CaptchaAction',
                'fixedVerifyCode' => YII_ENV_TEST ? 'testme' : null,
            ],
        ];
    }

    public function init()
    {
        $this->contact = Contact::findOne(1);
    }
}