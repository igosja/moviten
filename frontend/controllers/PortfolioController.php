<?php

namespace frontend\controllers;

use common\models\PagePortfolio;
use common\models\PortfolioCategory;

class PortfolioController extends BaseController
{
    public function actionIndex()
    {
        $a_category = PortfolioCategory::find()->where(['status' => 1])->orderBy('`order` DESC')->all();
        $o_page = PagePortfolio::findOne(1);

        $this->view->title = $o_page['seo_title'];
        $this->view->registerMetaTag(['name' => 'description', 'content' => $o_page['seo_description']]);
        $this->view->registerMetaTag(['name' => 'keywords', 'content' => $o_page['seo_keywords']]);

        $this->view->params['breadcrumbs'][] = $o_page['h1'];

        return $this->render('index', [
            'a_category' => $a_category,
            'o_page' => $o_page,
        ]);
    }

    public function actionView()
    {
        return $this->render('view');
    }
}