<?php

namespace frontend\controllers;

use common\models\PagePortfolio;
use common\models\Portfolio;
use common\models\PortfolioCategory;
use Yii;
use yii\helpers\Json;

class PortfolioController extends BaseController
{
    const ON_PAGE = 12;

    public function actionIndex($id = '')
    {
        if ($id) {
            $o_page = PortfolioCategory::findOne(['url' => $id]);
            if (!$o_page) {
                $this->redirect(['index']);
            }
            $this->view->params['breadcrumbs'][] = ['label' => 'Портфолио', 'url' => 'index'];
        } else {
            $o_page = PagePortfolio::findOne(1);
        }

        $a_category = PortfolioCategory::find()->where(['status' => 1])->orderBy('`order`')->all();

        $this->view->title = $o_page['seo_title'];
        $this->view->registerMetaTag(['name' => 'description', 'content' => $o_page['seo_description']]);
        $this->view->registerMetaTag(['name' => 'keywords', 'content' => $o_page['seo_keywords']]);

        $this->view->params['breadcrumbs'][] = $o_page['h1'];

        if ($id) {
            $a_portfolio = Portfolio::find()
                ->where(['portfoliocategory_id' => $o_page['id'], 'status' => 1])
                ->limit(self::ON_PAGE)
                ->orderBy('id ASC')
                ->all();
            $count = Portfolio::find()
                ->where(['portfoliocategory_id' => $o_page['id'], 'status' => 1])
                ->count();
        } else {
            $a_portfolio = Portfolio::find()
                ->where(['status' => 1])
                ->limit(self::ON_PAGE)
                ->orderBy('id ASC')
                ->all();
            $count = Portfolio::find()
                ->where(['status' => 1])
                ->count();
        }

        if ($count > self::ON_PAGE) {
            $more = true;
        } else {
            $more = false;
        }

        return $this->render('index', [
            'a_category' => $a_category,
            'a_portfolio' => $a_portfolio,
            'more' => $more,
            'o_page' => $o_page,
        ]);
    }

    public function actionView($id)
    {
        $o_portfolio = Portfolio::findOne(['url' => $id]);
        if (!$o_portfolio) {
            return $this->redirect(['index']);
        }

        $o_next = Portfolio::find()
            ->select(['url'])
            ->where(['status' => 1, 'portfoliocategory_id' => $o_portfolio['portfoliocategory_id']])
            ->andWhere(['>', 'id', $o_portfolio['id']])
            ->orderBy('id ASC')
            ->one();

        $o_prev = Portfolio::find()
            ->select(['url'])
            ->where(['status' => 1, 'portfoliocategory_id' => $o_portfolio['portfoliocategory_id']])
            ->andWhere(['<', 'id', $o_portfolio['id']])
            ->orderBy('id DESC')
            ->one();

        $this->view->title = $o_portfolio['seo_title'];
        $this->view->registerMetaTag(['name' => 'description', 'content' => $o_portfolio['seo_description']]);
        $this->view->registerMetaTag(['name' => 'keywords', 'content' => $o_portfolio['seo_keywords']]);

        $this->view->params['breadcrumbs'][] = ['label' => 'Портфолио', 'url' => ['index']];
        $this->view->params['breadcrumbs'][] = [
            'label' => $o_portfolio['portfoliocategory']['h1'], 'url' => ['index', 'id' => $o_portfolio['portfoliocategory']['url']]
        ];
        $this->view->params['breadcrumbs'][] = $o_portfolio['h1'];

        return $this->render('view', [
            'o_next' => $o_next,
            'o_portfolio' => $o_portfolio,
            'o_prev' => $o_prev,
        ]);
    }

    public function actionMore($id = 0)
    {
        if ($id) {
            $o_projectcategory = PortfolioCategory::findOne($id);
            if (!$o_projectcategory) {
                unset($o_projectcategory);
            }
        }
        if (isset($o_projectcategory)) {
            $a_project = Portfolio::find()
                ->where(['portfoliocategory_id' => $id, 'status' => 1])
                ->offset(self::ON_PAGE + Yii::$app->request->get('offset', 0))
                ->limit(self::ON_PAGE)
                ->orderBy('id ASC')
                ->all();
        } else {
            $a_project = Portfolio::find()
                ->where(['status' => 1])
                ->offset(self::ON_PAGE + Yii::$app->request->get('offset', 0))
                ->limit(self::ON_PAGE)
                ->orderBy('id ASC')
                ->all();
        }
        $result = '';
        foreach ($a_project as $item) {
            $result = $this->renderPartial('item', ['item' => $item]);
        }
        return $result;
    }

    public function actionCheck($id = 0)
    {
        if ($id) {
            $o_projectcategory = PortfolioCategory::findOne($id);
            if (!$o_projectcategory) {
                unset($o_projectcategory);
            }
        }
        if (isset($o_projectcategory)) {
            $count = Portfolio::find()
                ->where(['portfoliocategory_id' => $id, 'status' => 1])
                ->count();
        } else {
            $count = Portfolio::find()
                ->where(['status' => 1])
                ->count();
        }
        $offset = Yii::$app->request->get('offset', 0) + self::ON_PAGE;
        $remove = false;
        if ($count <= $offset + self::ON_PAGE) {
            $remove = true;
        }
        return Json::encode(array('remove' => $remove, 'offset' => $offset));
    }
}