<?php

namespace frontend\controllers;

use common\models\Contact;
use frontend\models\ContactForm;
use Yii;

class ContactController extends BaseController
{
    public function actionIndex()
    {
        $model = new ContactForm();

        if ($model->load(Yii::$app->request->post()) && $model->validate()) {
            $email = Contact::find()->select(['email'])->where(['id' => 1])->one();
            if ($email) {
                $email = $email['email'];
            }
            if ($email) {
                $model->sendEmail($email);
            }

            Yii::$app->session->setFlash('thanks', true);
            return $this->refresh();
        }

        $o_page = Contact::findOne(1);

        $this->view->title = $o_page['seo_title'];
        $this->view->registerMetaTag(['name' => 'description', 'content' => $o_page['seo_description']]);
        $this->view->registerMetaTag(['name' => 'keywords', 'content' => $o_page['seo_keywords']]);

        $this->view->params['breadcrumbs'][] = $o_page['h1'];

        return $this->render('index', [
            'model' => $model,
            'o_page' => $o_page,
        ]);
    }
}