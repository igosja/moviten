<?php

namespace backend\controllers;

use backend\models\ServiceSearch;
use common\models\Service;
use Yii;
use yii\web\NotFoundHttpException;
use yii\web\UploadedFile;

class ServiceController extends BaseController
{
    public $bread = 'Услуги';
    public $not_found = 'Услуга не найдена';
    public $title_create = 'Создание услуги';
    public $title_edit = 'Редактирование услуги';
    public $title_index = 'Услуги';

    public function actionIndex()
    {
        $searchModel = new ServiceSearch();
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);

        $this->view->title = $this->title_index;
        $this->view->params['breadcrumbs'][] = $this->bread;

        return $this->render('index', [
            'dataProvider' => $dataProvider,
        ]);
    }

    public function actionUpdate($id = 0)
    {
        if (0 == $id) {
            $model = new Service();
        } else {
            $model = Service::findOne($id);
            if (!$model) {
                throw new NotFoundHttpException($this->not_found);
            }
        }

        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            $model['upload_image'] = UploadedFile::getInstance($model, 'upload_image');
            if ($model['upload_image']) {
                $image_id = $model->upload();
                $model = Service::findOne($model->primaryKey);
                $model['image_id'] = $image_id;
                $model->save();
            }
            Yii::$app->session->setFlash('success', $this->saved);
            return $this->redirect(['update', 'id' => $model->primaryKey]);
        }

        $this->view->params['breadcrumbs'][] = ['label' => $this->bread, 'url' => ['index']];
        if ($model->primaryKey) {
            $this->view->params['breadcrumbs'][] = ['label' => $model['h1'], 'url' => ['view', 'id' => $model->primaryKey]];
            $this->view->title = $this->title_edit;
        } else {
            $this->view->title = $this->title_create;
        }
        $this->view->params['breadcrumbs'][] = $this->view->title;

        return $this->render('form', [
            'model' => $model,
        ]);
    }

    public function actionView($id)
    {
        $model = Service::findOne($id);
        if (!$model) {
            throw new NotFoundHttpException($this->not_found);
        }

        $this->view->title = $model['h1'];
        $this->view->params['breadcrumbs'][] = ['label' => $this->bread, 'url' => ['index']];
        $this->view->params['breadcrumbs'][] = $this->view->title;

        return $this->render('view', [
            'model' => $model,
        ]);
    }

    public function actionDelete($id)
    {
        $model = Service::findOne($id);
        if (!$model) {
            throw new NotFoundHttpException($this->not_found);
        }

        $model->delete();

        Yii::$app->session->setFlash('success', $this->saved);
        return $this->redirect(['index']);
    }

    public function actionImage($id)
    {
        $model = Service::findOne($id);
        if (!$model) {
            throw new NotFoundHttpException($this->not_found);
        }
        $model['image_id'] = 0;
        $model->save();

        return $this->redirect(['update', 'id' => $model->primaryKey]);
    }

    public function actionStatus($id)
    {
        $model = Service::findOne($id);
        if ($model) {
            $model['status'] = 1 - $model['status'];
            $model->save();
        }
    }

    public function actionOrder($id)
    {
        $order_old = (int)Yii::$app->request->get('order_old', 0);
        $order_new = (int)Yii::$app->request->get('order_new', 0);
        Service::updateAll(['`order`' => $order_new], ['id' => $id]);
        if ($order_old < $order_new) {
            $a_model = Service::find()
                ->where(['>=', '`order`', $order_old])
                ->andWhere(['<=', '`order`', $order_new])
                ->andWhere(['!=', 'id', $id])
                ->all();
            foreach ($a_model as $model) {
                $model['order'] = $model['order'] - 1;
                $model->save();
            }
        } else {
            $a_model = Service::find()
                ->where(['<=', '`order`', $order_old])
                ->andWhere(['>=', '`order`', $order_new])
                ->andWhere(['!=', 'id', $id])
                ->all();
            foreach ($a_model as $model) {
                $model['order'] = $model['order'] + 1;
                $model->save();
            }
        }
    }
}