<?php

namespace backend\controllers;

use Yii;
use common\models\LoginForm;

class SiteController extends BaseController
{

    public function actionIndex()
    {
        $this->view->title = 'Moviten';

        return $this->render('index');
    }

    public function actionLogin()
    {
        if (!Yii::$app->user->isGuest) {
            return $this->goHome();
        }

        $model = new LoginForm();
        if ($model->load(Yii::$app->request->post()) && $model->login()) {
            return $this->goBack();
        }

        $this->view->title = 'Вход';
        $this->view->params['breadcrumbs'][] = $this->view->title;

        return $this->render('login', [
            'model' => $model,
        ]);
    }

    public function actionLogout()
    {
        Yii::$app->user->logout();

        return $this->goHome();
    }
}
