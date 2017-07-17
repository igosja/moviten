<?php

/**
 * @var $o_next \common\models\Service
 * @var $o_prev \common\models\Service
 * @var $o_service \common\models\Service
 */

use common\models\HelperImage;
use yii\helpers\Html;

?>
<section class="content">
    <div class="wrap usluga">
        <?= Yii::$app->controller->renderPartial('//include/bread'); ?>
        <h1 class="m-title"><?= $o_service['h1']; ?></h1>
        <img src="<?= HelperImage::resize($o_service['image_id'], 1600, 500); ?>" alt="<?= $o_service['h1']; ?>" class="usluga-img" />
        <?= $o_service['text']; ?>
        <div class="pager centered">
            <?php if ($o_prev) { ?>
                <?= Html::a('Предыдущая услуга', ['view', 'id' => $o_prev['url']], ['class' => 'pager__prev']); ?>
            <?php } ?>
            <?php if ($o_next) { ?>
                <?= Html::a('Следующая услуга', ['view', 'id' => $o_next['url']], ['class' => 'pager__next']); ?>
            <?php } ?>
        </div>
    </div>
</section>