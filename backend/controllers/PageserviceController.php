<?php

namespace backend\controllers;

use common\models\PageService;
use Yii;
use yii\web\NotFoundHttpException;

class PageserviceController extends BaseController
{
    public $bread = 'Страница услуг';
    public $not_found = 'Страница не найдена';
    public $title_edit = 'Редактирование';
    public $title_index = 'Страница услуг';

    public function actionIndex()
    {
        $model = PageService::findOne(1);
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
        $model = PageService::findOne(1);
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
