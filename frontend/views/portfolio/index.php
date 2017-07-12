<?php

/**
 * @var $a_category array
 * @var $o_page \common\models\PagePortfolio
 */

use yii\helpers\Html;

?>
<section class="content ">
    <div class="wrap usluga">
        <?= Yii::$app->controller->renderPartial('//include/bread'); ?>
        <h1 class="m-title"><?= $o_page['h1']; ?></h1>
        <div class="b-portfolio__menu">
            <a href="" class="b-portfolio__menu__i active">Все</a>
            <?php foreach ($a_category as $item) { ?>
                <?= Html::a(
                    $item['h1'],
                    ['index', 'id' => $item['url']],
                    ['class' => 'b-portfolio__menu__i']
                ); ?>
            <?php } ?>
        </div>
        <div class="uslugi-b clearfix">
            <?= Html::a(
                '<img src="img/uslugi-page/uslugi-1.jpg" alt="">
                <div class="uslugi-b__i__in">
                    <div class="uslugi-b__i__title">Объект 1</div>
                    <div href="javascript:" class="uslugi-b__i__btn">Детальніше</div>
                </div>',
                ['view'],
                ['class' => 'uslugi-b__i']
            ); ?>
            <a href="javascript:" class="uslugi-b__i">
                <img src="img/uslugi-page/uslugi-2.jpg" alt="">

                <div class="uslugi-b__i__in">
                    <div class="uslugi-b__i__title">Объект 2</div>
                    <div href="javascript:" class="uslugi-b__i__btn">Детальніше</div>
                </div>
            </a>
            <a href="javascript:" class="uslugi-b__i">
                <img src="img/uslugi-page/uslugi-3.jpg" alt="">

                <div class="uslugi-b__i__in">
                    <div class="uslugi-b__i__title">Объект 3</div>
                    <div href="javascript:" class="uslugi-b__i__btn">Детальніше</div>
                </div>
            </a>
            <a href="javascript:" class="uslugi-b__i">
                <img src="img/uslugi-page/uslugi-4.jpg" alt="">

                <div class="uslugi-b__i__in">
                    <div class="uslugi-b__i__title">Объект 4</div>
                    <div href="javascript:" class="uslugi-b__i__btn">Детальніше</div>
                </div>
            </a>
            <a href="javascript:" class="uslugi-b__i">
                <img src="img/uslugi-page/uslugi-5.jpg" alt="">

                <div class="uslugi-b__i__in">
                    <div class="uslugi-b__i__title">Объект 5</div>
                    <div href="javascript:" class="uslugi-b__i__btn">Детальніше</div>
                </div>
            </a>
            <a href="javascript:" class="uslugi-b__i">
                <img src="img/uslugi-page/uslugi-6.jpg" alt="">

                <div class="uslugi-b__i__in">
                    <div class="uslugi-b__i__title">Объект 6</div>
                    <div href="javascript:" class="uslugi-b__i__btn">Детальніше</div>
                </div>
            </a>
            <a href="javascript:" class="uslugi-b__i">
                <img src="img/uslugi-page/uslugi-7.jpg" alt="">

                <div class="uslugi-b__i__in">
                    <div class="uslugi-b__i__title">Объект 7</div>
                    <div href="javascript:" class="uslugi-b__i__btn">Детальніше</div>
                </div>
            </a>
            <a href="javascript:" class="uslugi-b__i">
                <img src="img/uslugi-page/uslugi-8.jpg" alt="">

                <div class="uslugi-b__i__in">
                    <div class="uslugi-b__i__title">Объект 8</div>
                    <div href="javascript:" class="uslugi-b__i__btn">Детальніше</div>
                </div>
            </a>
            <a href="javascript:" class="uslugi-b__i">
                <img src="img/uslugi-page/uslugi-5.jpg" alt="">

                <div class="uslugi-b__i__in">
                    <div class="uslugi-b__i__title">Объект 9</div>
                    <div href="javascript:" class="uslugi-b__i__btn">Детальніше</div>
                </div>
            </a>
            <a href="javascript:" class="uslugi-b__i">
                <img src="img/uslugi-page/uslugi-6.jpg" alt="">

                <div class="uslugi-b__i__in">
                    <div class="uslugi-b__i__title">Объект 10</div>
                    <div href="javascript:" class="uslugi-b__i__btn">Детальніше</div>
                </div>
            </a>
            <a href="javascript:" class="uslugi-b__i">
                <img src="img/uslugi-page/uslugi-7.jpg" alt="">

                <div class="uslugi-b__i__in">
                    <div class="uslugi-b__i__title">Объект 11</div>
                    <div href="javascript:" class="uslugi-b__i__btn">Детальніше</div>
                </div>
            </a>
            <a href="javascript:" class="uslugi-b__i">
                <img src="img/uslugi-page/uslugi-8.jpg" alt="">

                <div class="uslugi-b__i__in">
                    <div class="uslugi-b__i__title">Объект 12</div>
                    <div href="javascript:" class="uslugi-b__i__btn">Детальніше</div>
                </div>
            </a>
        </div>
        <a href="javascript:" class="portfolio-more">Загрузити ще</a>
    </div>
</section>