<?php

namespace frontend\controllers;

use common\models\PageMain;

class SiteController extends BaseController
{
    public function actionIndex()
    {
        $o_page = PageMain::findOne(1);

        $this->view->title = $o_page['seo_title'];
        $this->view->registerMetaTag(['name' => 'description', 'content' => $o_page['seo_description']]);
        $this->view->registerMetaTag(['name' => 'keywords', 'content' => $o_page['seo_keywords']]);

        return $this->render('index', [
            'o_page' => $o_page,
        ]);
    }
}