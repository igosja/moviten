<?php
/**
 * @var $o_page \common\models\Contact
 */
?>
<section class="content">
    <div class="wrap usluga">
        <?= Yii::$app->controller->renderPartial('//include/bread'); ?>
        <h1 class="m-title"><?= $o_page['h1']; ?></h1>
        <div class="contacts-b clearfix">
            <div class="contacts-b__item">
                <h3 class="contacts-b__item__title">Адрес:</h3>
                <div class="contacts-b__item__text">
                    <?= $o_page['address_1']; ?><br />
                    <?= $o_page['address_2']; ?><br />
                    <?= $o_page['address_3']; ?><br />
                </div>
            </div>
            <div class="contacts-b__item">
                <h3 class="contacts-b__item__title">Телефоны:</h3>
                <div class="contacts-b__item__text">
                    <?= $o_page['phone_1']; ?><br />
                    <?= $o_page['phone_2']; ?>
                </div>
            </div>
            <div class="contacts-b__item">
                <h3 class="contacts-b__item__title">E-mail:</h3>
                <div class="contacts-b__item__text">
                    <a href="javascript:"><?= $o_page['email']; ?></a>
                </div>
            </div>
            <div class="contacts-b__item">
                <h3 class="contacts-b__item__title">График роботы:</h3>
                <div class="contacts-b__item__text">
                    <span>Пн-Пт: </span><?= $o_page['shedule_mn']; ?><br />
                    <span>Сб: </span><?= $o_page['shedule_st']; ?><br />
                    <span>Вс: </span><?= $o_page['shedule_sn']; ?>
                </div>
            </div>
        </div>
    </div>
    <div class="mab-b">
        <div id="map" data-lat="<?= $o_page['google_lat']; ?>" data-lng="<?= $o_page['google_lng']; ?>"></div>
        <div class="mab-b__wrap">
            <div class="mab-b__form">
                <form>
                    <div class="of-form__title">Обратная связь</div>
                    <div class="of-wrap clearfix">
                        <div class="need"><input type="text" class="of-input of-input_name" placeholder="Ваше имя" required /></div>
                        <div class="need"><input type="tel" class="of-input of-input_phone phone_mask" placeholder="Телефон" required /></div>
                        <input type="email" class="of-input of-input_email" placeholder="E-mail" required=" " />
                        <div class="need"><textarea placeholder="Сообщение" class="of-form__textarea"></textarea></div>
                        <div class="of-form__text"><span></span>Поля обязательные к заполнению</div>
                        <a href="javascript:" class="of-submit of-submit__contacts">Отправить</a>
                    </div>
                </form>
            </div>
        </div>
    </div>
</section>