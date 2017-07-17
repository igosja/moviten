<?php

/**
 * @var $o_page \common\models\PageMain
 */

use common\models\HelperImage;

?>
<section class="content">
    <div class="wrap usluga">
        <?= Yii::$app->controller->renderPartial('//include/bread'); ?>
        <h1 class="m-title"><?= $o_page['h1']; ?></h1>
        <img src="<?= HelperImage::resize($o_page['image_id'], 1180, 400); ?>" alt="" class="usluga-img" />
        <h2><?= $o_page['h2']; ?></h2>
        <?= $o_page['text_1']; ?>
        <h3><?= $o_page['h3_1']; ?></h3>
        <?= $o_page['text_2']; ?>
        <h3><?= $o_page['h3_2']; ?></h3>
        <div class="our-team clearfix">
            <div class="our-team__i">
                <img src="<?= HelperImage::resize($o_page['team_1'], 290, 290); ?>" alt="<?= $o_page['h1']; ?>">
            </div>
            <div class="our-team__i">
                <img src="<?= HelperImage::resize($o_page['team_2'], 290, 290); ?>" alt="<?= $o_page['h1']; ?>">
            </div>
            <div class="our-team__i">
                <img src="<?= HelperImage::resize($o_page['team_3'], 290, 290); ?>" alt="<?= $o_page['h1']; ?>">
            </div>
            <div class="our-team__i">
                <img src="<?= HelperImage::resize($o_page['team_4'], 290, 290); ?>" alt="<?= $o_page['h1']; ?>">
            </div>
        </div>
        <?= $o_page['text_3']; ?>
    </div>
</section>
