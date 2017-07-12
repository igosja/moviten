<?php

namespace frontend\controllers;

use common\models\Contact;

class ContactController extends BaseController
{
    public function actionIndex()
    {
        $o_page = Contact::findOne(1);

        $this->view->title = $o_page['seo_title'];
        $this->view->registerMetaTag(['name' => 'description', 'content' => $o_page['seo_description']]);
        $this->view->registerMetaTag(['name' => 'keywords', 'content' => $o_page['seo_keywords']]);

        $this->view->params['breadcrumbs'][] = $o_page['h1'];

        return $this->render('index', [
            'o_page' => $o_page,
        ]);
    }
}