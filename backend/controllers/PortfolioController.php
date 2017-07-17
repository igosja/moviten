<?php

namespace backend\controllers;

use backend\models\PortfolioSearch;
use common\models\Portfolio;
use common\models\PortfolioCategory;
use Yii;
use yii\web\NotFoundHttpException;

class PortfolioController extends BaseController
{
    public $bread = 'Портфолио';
    public $not_found = 'Портфолио не найден';
    public $title_create = 'Создание портфолио';
    public $title_edit = 'Редактирование портфолио';
    public $title_index = 'Портфолио';

    public function actionIndex()
    {
        $searchModel = new PortfolioSearch();
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);

        $this->view->title = $this->title_index;
        $this->view->params['breadcrumbs'][] = $this->bread;

        $a_portfoliocategory = PortfolioCategory::find()->orderBy('h1 ASC')->all();

        return $this->render('index', [
            'a_portfoliocategory' => $a_portfoliocategory,
            'dataProvider' => $dataProvider,
            'searchModel' => $searchModel,
        ]);
    }

    public function actionUpdate($id = 0)
    {
        if (0 == $id) {
            $model = new Portfolio();
        } else {
            $model = Portfolio::findOne($id);
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

        $a_portfoliocategory = PortfolioCategory::find()->orderBy('h1 ASC')->all();

        return $this->render('form', [
            'a_portfoliocategory' => $a_portfoliocategory,
            'model' => $model,
        ]);
    }

    public function actionView($id)
    {
        $model = Portfolio::findOne($id);
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
        $model = Portfolio::findOne($id);
        if (!$model) {
            throw new NotFoundHttpException($this->not_found);
        }

        $model->delete();

        Yii::$app->session->setFlash('success', $this->saved);
        return $this->redirect(['index']);
    }

    public function actionStatus($id)
    {
        $model = Portfolio::findOne($id);
        if ($model) {
            $model['status'] = 1 - $model['status'];
            $model->save();
        }
    }

    public function actionOrder($id)
    {
        $order_old = (int)Yii::$app->request->get('order_old', 0);
        $order_new = (int)Yii::$app->request->get('order_new', 0);
        Portfolio::updateAll(['`order`' => $order_new], ['id' => $id]);
        if ($order_old < $order_new) {
            $a_model = Portfolio::find()
                ->where(['>=', '`order`', $order_old])
                ->andWhere(['<=', '`order`', $order_new])
                ->andWhere(['!=', 'id', $id])
                ->all();
            foreach ($a_model as $model) {
                $model['order'] = $model['order'] - 1;
                $model->save();
            }
        } else {
            $a_model = Portfolio::find()
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