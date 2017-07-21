<?php

/**
 * @var $item \common\models\Portfolio
 */

use common\models\HelperImage;
use yii\helpers\Html;

?>
<?= Html::a(
    '<img src="' . HelperImage::resize(
        (isset($item['image'][0]['image_id']) ? $item['image'][0]['image_id'] : 0),
        290,
        290
    ) . '" alt="' . $item['url'] . '">
    <div class="uslugi-b__i__in">
        <div class="uslugi-b__i__title">' . $item['h1'] . '</div>
        <div class="uslugi-b__i__btn">Подробнее</div>
    </div>',
    ['view', 'id' => $item['url']],
    ['class' => 'uslugi-b__i']
); ?>