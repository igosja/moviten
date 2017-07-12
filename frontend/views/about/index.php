<?php
/**
 * @var $o_page \common\models\PageMain
 */
?>
<section class="content">
    <div class="wrap usluga">
        <?= Yii::$app->controller->renderPartial('//include/bread'); ?>
        <h1 class="m-title"><?= $o_page['h1']; ?></h1>
        <img src="/img/about-us.png" alt="" class="usluga-img" />
        <h2><?= $o_page['h2']; ?></h2>
        <?= $o_page['text_1']; ?>
        <h3><?= $o_page['h3_1']; ?></h3>
        <?= $o_page['text_2']; ?>
        <h3><?= $o_page['h3_2']; ?></h3>
        <div class="our-team clearfix">
            <div class="our-team__i">
                <img src="/img/team/member-1.jpg" alt="">
            </div>
            <div class="our-team__i">
                <img src="/img/team/member-2.jpg" alt="">
            </div>
            <div class="our-team__i">
                <img src="/img/team/member-3.jpg" alt="">
            </div>
            <div class="our-team__i">
                <img src="/img/team/member-4.jpg" alt="">
            </div>
        </div>
        <?= $o_page['text_3']; ?>
    </div>
</section>
