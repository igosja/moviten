<?php

/**
 * @var $item \common\models\Portfolio
 */

use yii\helpers\Html;

?>
<?= Html::a(
    '<img src="/img/uslugi-page/uslugi-1.jpg" alt="">
    <div class="uslugi-b__i__in">
        <div class="uslugi-b__i__title">' . $item['url'] . '</div>
        <div class="uslugi-b__i__btn">Подробнее</div>
    </div>',
    ['view', 'id' => $item['url']],
    ['class' => 'uslugi-b__i']
); ?>