<?php

/**
 * @var $o_page \common\models\PageMain
 */

use yii\helpers\Html;

?>
<section class="content ">
    <div class="wrap usluga">
        <?= Yii::$app->controller->renderPartial('//include/bread'); ?>
        <h1 class="m-title"><?= $o_page['h1']; ?></h1>
        <div class="uslugi-b clearfix">
            <?= Html::a(
                '<img src="img/uslugi-page/uslugi-1.jpg" alt="">
                <div class="uslugi-b__i__in">
                    <div class="uslugi-b__i__title">Проектування</div>
                    <div href="javascript:" class="uslugi-b__i__btn">Детальніше</div>
                </div>',
                ['view'],
                ['class' => 'uslugi-b__i']
            )?>
            <a href="javascript:" class="uslugi-b__i">
                <img src="img/uslugi-page/uslugi-2.jpg" alt="">

                <div class="uslugi-b__i__in">
                    <div class="uslugi-b__i__title">Обстеження<br />і підсилення конструкцій</div>
                    <div href="javascript:" class="uslugi-b__i__btn">Детальніше</div>
                </div>
            </a>
            <a href="javascript:" class="uslugi-b__i">
                <img src="img/uslugi-page/uslugi-3.jpg" alt="">

                <div class="uslugi-b__i__in">
                    <div class="uslugi-b__i__title">Консалтинг<br />в сфері будівництва</div>
                    <div href="javascript:" class="uslugi-b__i__btn">Детальніше</div>
                </div>
            </a>
            <a href="javascript:" class="uslugi-b__i">
                <img src="img/uslugi-page/uslugi-4.jpg" alt="">

                <div class="uslugi-b__i__in">
                    <div class="uslugi-b__i__title">Оцінка нерухомості</div>
                    <div href="javascript:" class="uslugi-b__i__btn">Детальніше</div>
                </div>
            </a>
            <a href="javascript:" class="uslugi-b__i">
                <img src="img/uslugi-page/uslugi-5.jpg" alt="">

                <div class="uslugi-b__i__in">
                    <div class="uslugi-b__i__title">Управління проектами</div>
                    <div href="javascript:" class="uslugi-b__i__btn">Детальніше</div>
                </div>
            </a>
            <a href="javascript:" class="uslugi-b__i">
                <img src="img/uslugi-page/uslugi-6.jpg" alt="">

                <div class="uslugi-b__i__in">
                    <div class="uslugi-b__i__title">Науково-дослідні роботи</div>
                    <div href="javascript:" class="uslugi-b__i__btn">Детальніше</div>
                </div>
            </a>
            <a href="javascript:" class="uslugi-b__i">
                <img src="img/uslugi-page/uslugi-7.jpg" alt="">

                <div class="uslugi-b__i__in">
                    <div class="uslugi-b__i__title">Розробка нормативної<br />документації</div>
                    <div href="javascript:" class="uslugi-b__i__btn">Детальніше</div>
                </div>
            </a>
            <a href="javascript:" class="uslugi-b__i">
                <img src="img/uslugi-page/uslugi-8.jpg" alt="">

                <div class="uslugi-b__i__in">
                    <div class="uslugi-b__i__title">Термоаудит</div>
                    <div href="javascript:" class="uslugi-b__i__btn">Детальніше</div>
                </div>
            </a>
        </div>
        <div class="centered">
            <?= $o_page['text']; ?>
        </div>
    </div>
</section>