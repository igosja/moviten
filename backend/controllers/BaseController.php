<?php

namespace backend\controllers;

use yii\filters\AccessControl;
use yii\web\Controller;

class BaseController extends Controller
{
    public $access_denied = 'Доступ запрещен';
    public $saved = 'Изменения сохранены';

    public function behaviors()
    {
        return [
            'access' => [
                'class' => AccessControl::className(),
                'rules' => [
                    [
                        'allow' => true,
                        'roles' => ['@'],
                    ],
                ],
            ],
        ];
    }
}
