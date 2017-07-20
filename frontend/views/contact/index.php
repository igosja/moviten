<?php

/**
 * @var $model \frontend\models\ContactForm
 * @var $o_page \common\models\Contact
 */

use yii\helpers\Html;
use yii\widgets\ActiveForm;

?>
<section class="content">
    <div class="wrap usluga">
        <?= Yii::$app->controller->renderPartial('//include/bread'); ?>
        <h1 class="m-title"><?= $o_page['h1']; ?></h1>
        <div class="contacts-b clearfix">
            <div class="contacts-b__item">
                <h3 class="contacts-b__item__title">Адрес:</h3>
                <div class="contacts-b__item__text">
                    <?= $o_page['address_1']; ?><br/>
                    <?= $o_page['address_2']; ?><br/>
                    <?= $o_page['address_3']; ?><br/>
                </div>
            </div>
            <div class="contacts-b__item">
                <h3 class="contacts-b__item__title">Телефоны:</h3>
                <div class="contacts-b__item__text">
                    <?= $o_page['phone_1']; ?><br/>
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
                    <span>Пн-Пт: </span><?= $o_page['shedule_mn']; ?><br/>
                    <span>Сб: </span><?= $o_page['shedule_st']; ?><br/>
                    <span>Вс: </span><?= $o_page['shedule_sn']; ?>
                </div>
            </div>
        </div>
    </div>
    <div class="mab-b">
        <div id="map" data-lat="<?= $o_page['google_lat']; ?>" data-lng="<?= $o_page['google_lng']; ?>"></div>
        <div class="mab-b__wrap">
            <div class="mab-b__form">
                <?php $form = ActiveForm::begin([
                    'fieldConfig' => ['template' => "{input}{error}"],
                ]); ?>
                <div class="of-form__title">Обратная связь</div>
                <div class="of-wrap clearfix">
                    <div class="need">
                        <?= $form->field($model, 'name')->textInput(
                            ['class' => 'of-input of-input_name', 'placeholder' => 'Ваше имя']
                        ); ?>
                    </div>
                    <div class="need">
                        <?= $form->field($model, 'phone')->textInput(
                            ['class' => 'of-input of-input_phone phone_mask', 'placeholder' => 'Телефон']
                        ); ?>
                    </div>
                    <div>
                        <?= $form->field($model, 'email')->textInput(
                            ['class' => 'of-input of-input_email', 'placeholder' => 'Email']
                        ); ?>
                    </div>
                    <div class="need">
                        <?= $form->field($model, 'text')->textarea(
                            ['class' => 'of-form__textarea', 'placeholder' => 'Сообщение']
                        ); ?>
                    </div>
                    <div class="of-form__text"><span></span>Поля, обязательные для заполнения</div>
                    <?= Html::submitButton('', ['class' => 'hidden', 'id' => 'submit-button-contact']); ?>
                    <a href="javascript:" class="of-submit of-submit__contacts">
                        Отправить
                    </a>
                </div>
                <?php ActiveForm::end(); ?>
            </div>
        </div>
    </div>
</section>