<?php

namespace frontend\controllers;

use common\models\PageService;
use common\models\Service;

class ServiceController extends BaseController
{
    public function actionIndex()
    {
        $a_service = Service::find()->where(['status' => 1])->orderBy('`order` ASC')->all();

        $o_page = PageService::findOne(1);

        $this->view->title = $o_page['seo_title'];
        $this->view->registerMetaTag(['name' => 'description', 'content' => $o_page['seo_description']]);
        $this->view->registerMetaTag(['name' => 'keywords', 'content' => $o_page['seo_keywords']]);

        $this->view->params['breadcrumbs'][] = $o_page['h1'];

        return $this->render('index', [
            'a_service' => $a_service,
            'o_page' => $o_page,
        ]);
    }

    public function actionView($id)
    {
        $o_service = Service::findOne(['url' => $id]);
        if (!$o_service) {
            $this->redirect(['index']);
        }

        $o_next = Service::find()
            ->select(['url'])
            ->where(['status' => 1])
            ->andWhere(['>', '`order`', $o_service['order']])
            ->orderBy('`order` ASC')
            ->one();

        $o_prev = Service::find()
            ->select(['url'])
            ->where(['status' => 1])
            ->andWhere(['<', '`order`', $o_service['order']])
            ->orderBy('`order` DESC')
            ->one();

        $this->view->title = $o_service['seo_title'];
        $this->view->registerMetaTag(['name' => 'description', 'content' => $o_service['seo_description']]);
        $this->view->registerMetaTag(['name' => 'keywords', 'content' => $o_service['seo_keywords']]);

        $this->view->params['breadcrumbs'][] = ['label' => 'Услуги', 'url' => $o_service['h1']];
        $this->view->params['breadcrumbs'][] = $o_service['h1'];

        return $this->render('view', [
            'o_next' => $o_next,
            'o_prev' => $o_prev,
            'o_service' => $o_service,
        ]);
    }
}