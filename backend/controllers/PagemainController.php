<?php

namespace backend\controllers;

use common\models\PageMain;
use Yii;
use yii\web\NotFoundHttpException;

class PagemainController extends BaseController
{
    public $bread = 'Главная странца';
    public $not_found = 'Страница не найдена';
    public $title_edit = 'Редактирование';
    public $title_index = 'Главная странца';

    public function actionIndex()
    {
        $model = PageMain::findOne(1);
        if (!$model) {
            throw new NotFoundHttpException($this->not_found);
        }

        $this->view->title = $this->title_index;
        $this->view->params['breadcrumbs'][] = $this->view->title;

        return $this->render('index', [
            'model' => $model,
        ]);
    }

    public function actionUpdate()
    {
        $model = PageMain::findOne(1);
        if (!$model) {
            throw new NotFoundHttpException($this->not_found);
        }

        if ($model->load(Yii::$app->request->post())) {
            if ($model->save()) {
                Yii::$app->session->setFlash('success', $this->saved);
                return $this->redirect(['update', 'id' => $model->primaryKey]);
            }
        }

        $this->view->title = $this->title_edit;
        $this->view->params['breadcrumbs'][] = ['label' => $this->bread, 'url' => ['index']];
        $this->view->params['breadcrumbs'][] = $this->view->title;

        return $this->render('form', [
            'model' => $model,
        ]);
    }
}
