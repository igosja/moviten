<?php

/**
 * @var $a_service array
 * @var $o_page \common\models\PageMain
 */

use common\models\HelperImage;
use yii\helpers\Html;

?>
<section class="content ">
    <div class="wrap usluga">
        <?= Yii::$app->controller->renderPartial('//include/bread'); ?>
        <h1 class="m-title"><?= $o_page['h1']; ?></h1>
        <div class="uslugi-b clearfix">
            <?php foreach ($a_service as $item) { ?>
                <?= Html::a(
                    '<img src="' . HelperImage::resize($item['image_id'], 290, 290) . '" alt="' . $item['h1'] . '">
                    <div class="uslugi-b__i__in">
                        <div class="uslugi-b__i__title">' . $item['h1'] . '</div>
                        <div class="uslugi-b__i__btn">Подробнее</div>
                    </div>',
                    ['view', 'id' => $item['url']],
                    ['class' => 'uslugi-b__i']
                ) ?>
            <?php } ?>
        </div>
        <div class="centered">
            <?= $o_page['text']; ?>
        </div>
    </div>
</section>