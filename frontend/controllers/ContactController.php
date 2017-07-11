<?php

namespace frontend\controllers;

class ContactController extends BaseController
{
    public function actionIndex()
    {
        return $this->render('index');
    }
}