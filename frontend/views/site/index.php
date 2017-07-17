<?php

/**
 * @var $a_portfolio array
 * @var $a_service array
 * @var $a_slide array
 * @var $o_page \common\models\PageMain
 */

use common\models\HelperImage;
use yii\helpers\Html;

?>
<section class="content content_main">
    <div id="slider" class="owl-carousel">
        <?php foreach ($a_slide as $item) { ?>
            <div class="item">
                <img src="<?= HelperImage::resize($item['image_id'], 1600, 500); ?>" alt="Мовитен"/>
            </div>
        <?php } ?>
    </div>
    <div class="wrap">
        <div class="m-text">
            <h1 class="m-text__title">Наши услуги</h1>
            <?= $o_page['text']; ?>
        </div>
        <div class="b-items clearfix">
            <?php foreach ($a_service as $item) { ?>
                <?= Html::a(
                    '<img
                        src="' . HelperImage::resize($item['image_id'], 260, 160) . '"
                        alt="' . $item['h1'] . '"
                        class="b-item__img"
                    >
                    <span class="b-item__text"><span></span>' . $item['h1'] . '</span>',
                    ['service/view', 'id' => $item['url']],
                    ['class' => 'b-item']
                ) ?>
            <?php } ?>
        </div>
        <div class="m-best">
            <div class="wrap">
                <div class="centered">
                    <h2 class="m-text__title">Лучшие проекты</h2>
                </div>
                <div class="slider-out">
                    <div class="slider-main clearfix">
                        <?php foreach ($a_portfolio as $item) { ?>
                            <div>
                                <?= Html::a(
                                    '<img src="https://vartist.com.ua/uploads/cab/382/c98/70b48dfe3d7b6ba50772.jpg" alt="">',
                                    ['portfolio/view', 'id' => $item['url']]
                                ); ?>
                                <div class="slider__text"><?= $item['h1']; ?></div>
                            </div>
                        <?php } ?>
                    </div>
                    <a href="javascript:" class="next"></a>
                    <a href="javascript:" class="prev"></a>
                </div>
            </div>
        </div>
    </div>
</section>