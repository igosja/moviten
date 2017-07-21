<?php

namespace console\controllers;

use common\models\Service;
use common\models\Portfolio;
use common\models\PortfolioCategory;
use yii\console\Controller;
use yii\helpers\Url;

class SitemapController extends Controller
{
    public function actionIndex()
    {
        $content = '<urlset xmlns="http://www.sitemaps.org/schemas/sitemap/0.9" xmlns:xsi="http://www.w3.org/2001/XMLSchema-instance" xsi:schemaLocation="http://www.sitemaps.org/schemas/sitemap/0.9">';
        $content = $content . '<url><loc>' . Url::to('/', true) . '</loc><lastmod>' . date('Y-m-d') . '</lastmod></url>';
        $content = $content . '<url><loc>' . Url::to('/about', true) . '</loc><lastmod>' . date('Y-m-d') . '</lastmod></url>';
        $content = $content . '<url><loc>' . Url::to('/service', true) . '</loc><lastmod>' . date('Y-m-d') . '</lastmod></url>';
        $content = $content . '<url><loc>' . Url::to('/portfolio', true) . '</loc><lastmod>' . date('Y-m-d') . '</lastmod></url>';
        $content = $content . '<url><loc>' . Url::to('/contact', true) . '</loc><lastmod>' . date('Y-m-d') . '</lastmod></url>';
        $a_service = Service::find()->select(['url'])->where(['status' => 1])->all();
        foreach ($a_service as $item) {
            $content = $content . '<url><loc>' . Url::to('service/' . $item['url'], true) . '</loc><lastmod>' . date('Y-m-d') . '</lastmod></url>';
        }
        $a_portfolio = Portfolio::find()->select(['url'])->where(['status' => 1])->all();
        foreach ($a_portfolio as $item) {
            $content = $content . '<url><loc>' . Url::to('/portfolio/view/' . $item['url'], true) . '</loc><lastmod>' . date('Y-m-d') . '</lastmod></url>';
        }
        $a_category = PortfolioCategory::find()->select(['url'])->where(['status' => 1])->all();
        foreach ($a_category as $item) {
            $content = $content . '<url><loc>' . Url::to('/portfolio/' . $item['url'], true) . '</loc><lastmod>' . date('Y-m-d') . '</lastmod></url>';
        }
        $content = $content . '</urlset>';
        $fp = fopen(__DIR__ . '/../../frontend/web/sitemap.xml', 'w');
        fwrite($fp, $content);
        fclose($fp);
        return true;
    }
}