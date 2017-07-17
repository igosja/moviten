<?php

/**
 * @var $a_category array
 * @var $a_portfolio array
 * @var $more boolean
 * @var $o_page \common\models\PagePortfolio
 */

use yii\helpers\Html;

?>
<section class="content ">
    <div class="wrap usluga">
        <?= Yii::$app->controller->renderPartial('//include/bread'); ?>
        <h1 class="m-title"><?= $o_page['h1']; ?></h1>
        <div class="b-portfolio__menu">
            <?= Html::a(
                'Все',
                ['index'],
                ['class' => 'b-portfolio__menu__i' . (Yii::$app->request->get('id') ? '' : ' active')]
            ); ?>
            <?php foreach ($a_category as $item) { ?>
                <?= Html::a(
                    $item['h1'],
                    ['index', 'id' => $item['url']],
                    ['class' => 'b-portfolio__menu__i' . ($item['url'] == Yii::$app->request->get('id') ? ' active' : '')]
                ); ?>
            <?php } ?>
        </div>
        <div class="uslugi-b clearfix">
            <?php foreach ($a_portfolio as $item) { ?>
                <?= Yii::$app->controller->renderPartial('item', ['item' => $item]); ?>
            <?php } ?>
        </div>
        <?php if ($more) { ?>
            <a
                    class="portfolio-more"
                    data-id="<?= Yii::$app->request->get('id') ? $o_page['id'] : 0; ?>"
                    data-offset="0"
                    href="javascript:"
            >
                Загрузить еще
            </a>
        <?php } ?>
    </div>
</section>