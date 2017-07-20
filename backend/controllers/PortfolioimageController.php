<?php

namespace backend\controllers;

use backend\models\PortfolioCategorySearch;
use common\models\PortfolioCategory;
use Yii;
use yii\web\NotFoundHttpException;

class PortfoliocategoryController extends BaseController
{
    public $bread = 'Категории';
    public $not_found = 'Категория не найдена';
    public $title_create = 'Создание категории';
    public $title_edit = 'Редактирование категории';
    public $title_index = 'Категории';

    public function actionIndex()
    {
        $searchModel = new PortfolioCategorySearch();
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
            $model = new PortfolioCategory();
        } else {
            $model = PortfolioCategory::findOne($id);
            if (!$model) {
                throw new NotFoundHttpException($this->not_found);
            }
        }

        if ($model->load(Yii::$app->request->post()) && $model->save()) {
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
        $model = PortfolioCategory::findOne($id);
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
        $model = PortfolioCategory::findOne($id);
        if (!$model) {
            throw new NotFoundHttpException($this->not_found);
        }

        $model->delete();

        Yii::$app->session->setFlash('success', $this->saved);
        return $this->redirect(['index']);
    }

    public function actionStatus($id)
    {
        $model = PortfolioCategory::findOne($id);
        if ($model) {
            $model['status'] = 1 - $model['status'];
            $model->save();
        }
    }

    public function actionOrder($id)
    {
        $order_old = (int)Yii::$app->request->get('order_old', 0);
        $order_new = (int)Yii::$app->request->get('order_new', 0);
        PortfolioCategory::updateAll(['`order`' => $order_new], ['id' => $id]);
        if ($order_old < $order_new) {
            $a_model = PortfolioCategory::find()
                ->where(['>=', '`order`', $order_old])
                ->andWhere(['<=', '`order`', $order_new])
                ->andWhere(['!=', 'id', $id])
                ->all();
            foreach ($a_model as $model) {
                $model['order'] = $model['order'] - 1;
                $model->save();
            }
        } else {
            $a_model = PortfolioCategory::find()
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