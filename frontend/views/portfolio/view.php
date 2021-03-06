<?php

/**
 * @var $o_next \common\models\Portfolio
 * @var $o_portfolio \common\models\Portfolio
 * @var $o_prev \common\models\Portfolio
 */

use common\models\HelperImage;
use yii\helpers\Html;

?>
<section class="content ">
    <div class="wrap">
        <?= Yii::$app->controller->renderPartial('//include/bread'); ?>
        <h1 class="m-title"><?= $o_portfolio['h1']; ?></h1>
    </div>
    <div class="slider-out">
        <div class="slider clearfix">
            <?php foreach ($o_portfolio['image'] as $item) { ?>
                <div>
                    <img
                            src="<?= HelperImage::resize($item['image_id'], 980, 600); ?>"
                            alt="<?= $o_portfolio['h1']; ?>"
                    />
                </div>
            <?php } ?>
        </div>
        <a href="javascript:" class="next"></a>
        <a href="javascript:" class="prev"></a>
    </div>
    <div class="slider-nav">
        <?php foreach ($o_portfolio['image'] as $item) { ?>
            <div>
                <img
                        src="<?= HelperImage::resize($item['image_id'], 980, 600); ?>"
                        alt="<?= $o_portfolio['h1']; ?>"
                />
            </div>
        <?php } ?>
    </div>
    <div class="wrap">
        <?= $o_portfolio['text']; ?>
        <div class="pager centered">
            <?php if ($o_prev) { ?>
                <?= Html::a('Предыдущий объект', ['view', 'id' => $o_prev['url']], ['class' => 'pager__prev']); ?>
            <?php } ?>
            <?php if ($o_next) { ?>
                <?= Html::a('Следующий объект', ['view', 'id' => $o_next['url']], ['class' => 'pager__next']); ?>
            <?php } ?>
        </div>
    </div>
</section>