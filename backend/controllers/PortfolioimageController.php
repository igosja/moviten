<?php

namespace backend\controllers;

use common\models\PortfolioImage;
use Yii;

class PortfolioimageController extends BaseController
{
    public function actionStatus($id)
    {
        $model = PortfolioImage::findOne($id);
        if ($model) {
            $model['status'] = 1 - $model['status'];
            $model->save();
        }
    }

    public function actionOrder($id)
    {
        $order_old = (int)Yii::$app->request->get('order_old', 0);
        $order_new = (int)Yii::$app->request->get('order_new', 0);
        $model = PortfolioImage::findOne($id);
        if ($model) {
            $portfolio_id = $model['portfolio_id'];
        } else {
            $portfolio_id = 0;
        }
        PortfolioImage::updateAll(['`order`' => $order_new], ['id' => $id]);
        if ($order_old < $order_new) {
            $a_model = PortfolioImage::find()
                ->where(['>=', '`order`', $order_old])
                ->andWhere(['<=', '`order`', $order_new])
                ->andWhere(['!=', 'id', $id])
                ->andWhere(['portfolio_id' => $portfolio_id])
                ->all();
            foreach ($a_model as $model) {
                $model['order'] = $model['order'] - 1;
                $model->save();
            }
        } else {
            $a_model = PortfolioImage::find()
                ->where(['<=', '`order`', $order_old])
                ->andWhere(['>=', '`order`', $order_new])
                ->andWhere(['!=', 'id', $id])
                ->andWhere(['portfolio_id' => $portfolio_id])
                ->all();
            foreach ($a_model as $model) {
                $model['order'] = $model['order'] + 1;
                $model->save();
            }
        }
    }
}