<?php

namespace frontend\controllers;

use common\models\Contact;
use common\models\PageMain;
use common\models\Portfolio;
use common\models\Service;
use common\models\Slide;
use frontend\models\OrderForm;
use Yii;

class SiteController extends BaseController
{
    public function actionIndex()
    {
        $model = new OrderForm();

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

        $o_page = PageMain::findOne(1);

        $this->view->title = $o_page['seo_title'];
        $this->view->registerMetaTag(['name' => 'description', 'content' => $o_page['seo_description']]);
        $this->view->registerMetaTag(['name' => 'keywords', 'content' => $o_page['seo_keywords']]);

        $a_portfolio = Portfolio::find()->where(['status' => 1])->orderBy('RAND()')->limit(5)->all();
        $a_service = Service::find()->where(['status' => 1])->orderBy('`order` ASC')->all();
        $a_slide = Slide::find()->where(['status' => 1])->orderBy('`order` ASC')->all();

        return $this->render('index', [
            'a_portfolio' => $a_portfolio,
            'a_service' => $a_service,
            'a_slide' => $a_slide,
            'o_page' => $o_page,
        ]);
    }
}