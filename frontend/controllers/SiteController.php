<?php

namespace frontend\controllers;

class SiteController extends BaseController
{
    public function actionIndex()
    {
        return $this->render('index');
    }
}