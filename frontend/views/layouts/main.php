<?php

/* @var $content string */
/* @var $this \yii\web\View */

use frontend\assets\AppAsset;
use yii\helpers\Html;

AppAsset::register($this);

?>
<?php $this->beginPage() ?>
<!DOCTYPE html>
<html lang="<?= Yii::$app->language ?>" class="no-js homepage"> <!--<![endif]-->
<head>
    <meta http-equiv="content-type" content="text/html; charset=utf-8"/>
    <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
    <?= Html::csrfMetaTags() ?>
    <title><?= Html::encode($this->title) ?></title>
    <meta name="viewport" content="width=device-width">
    <link rel="shortcut icon" href="/favicon.ico" type="image/x-icon">
    <?php $this->head() ?>
</head>
<body>
<?php $this->beginBody() ?>
<!--[if lt IE 7]>
<p class="browsehappy">
    You are using an <strong>outdated</strong> browser.Please
    <a target="_blank" rel="nofollow" href="http://browsehappy.com/">upgrade your browser</a>
    to improve your experience.
</p>
<![endif]-->
<div class="sitewrap">
    <header class="clearfix">
        <div class="wrap">
            <div class="header-top clearfix">
                <?= Html::a(
                    '<img src="/img/logo.png" alt="Мовитен">',
                    ['site/index'],
                    ['class' => 'logo']
                ); ?>
                <div class="header-phones">
                    <a href="tel:+380980448288">
                        +38 098 044 82 88
                    </a>
                    <a href="tel:+380507652354">
                        +38 050 765 23 54
                    </a>
                </div>
                <div class="header-top__right clearfix">
                    <div class="header-email">
                        E-mail:
                        <a href="javascript:">vartist@ukr.net</a>
                    </div>
                    <a href="javascript:" data-selector="form-order" class="header-offer overlayElementTrigger">
                        Заказать услугу
                    </a>
                </div>
            </div>
            <nav>
                <?= Html::a('О нас', ['about/index'], ['class' => 'nav-link']); ?>
                <?= Html::a('Услуги', ['service/index'], ['class' => 'nav-link']); ?>
                <?= Html::a('Портфолио', ['portfolio/index'], ['class' => 'nav-link']); ?>
                <?= Html::a('Контакты', ['contact/index'], ['class' => 'nav-link']); ?>
            </nav>
        </div>
    </header>

    <?= $content; ?>

    <div class="clearfix-footer"></div>
</div>
<footer>
    <div class="wrap">
        <div class="footer-top clearfix">
            <div class="footer-soc clearfix">
            </div>
            <div class="footer-contacts clearfix">
                <div class="footer-phones clearfix">
                    <a href="tel:+380980448288">
                        +38 098 044 82 88
                    </a>
                    <a href="tel:+380507652354">
                        +38 050 765 23 54
                    </a>
                </div>
                <a href="javascript:" class="footer-mail">
                    vartist@ukr.net
                </a>
            </div>
            <a href="javascript:" class="to-top">Вверх</a>
        </div>
        <div class="footer-info clearfix">
            <div class="footer-info__copy">
                © 2014—2017 «Вартість» проектне бюро, будівництво та архітектура
            </div>
        </div>
    </div>
</footer>
<section class="overlay-forms">
    <div class="form-overlay"></div>
    <div class="wrap">
        <div class="of-form form-order clearfix">
            <a href="javascript:" class="of-close"></a>
            <form id="yw0" action="/" method="post">
                <div class="of-form__title">Замовити послуги</div>
                <div class="of-wrap clearfix">
                    <div class="need">
                        <input class="of-input of-input_name" placeholder="Ваше ім’я" name="Order[name]" id="Order_name"
                               type="text" maxlength="255"/>
                        <div class="errorMessage" id="Order_name_em_" style="display:none"></div>
                    </div>
                    <div class="need">
                        <input class="of-input of-input_phone phone_mask" placeholder="Телефон" name="Order[telephone]"
                               id="Order_telephone" type="text"/>
                        <div class="errorMessage" id="Order_telephone_em_" style="display:none"></div>
                    </div>
                    <div>
                        <input class="of-input of-input_email" placeholder="E-mail" name="Order[email]" id="Order_email"
                               type="text"/>
                        <div class="errorMessage" id="Order_email_em_" style="display:none"></div>
                    </div>
                    <div class="jqui-select need">
                        <select name="Order[service]" id="Order_service">
                            <option value="Проетирование">Проектування</option>
                            <option value="Обследование и усиление конструкций ">Обстеження і підсилення конструкцій
                            </option>
                            <option value="Консалтинг в сфере строительства">Консалтінг в сфері будівництва</option>
                            <option value="Оценка недвижимости">Оцінка нерухомості</option>
                            <option value="Управление проектами">Управління проектами</option>
                            <option value="Научно-исследовательские работы">Науково-дослідні роботи</option>
                            <option value="Разработка нормативной документации">Розробка нормативної документації
                            </option>
                            <option value="Термоаудит">Термоаудит</option>
                        </select>
                        <div class="errorMessage" id="Order_service_em_" style="display:none"></div>
                    </div>
                    <textarea class="of-form__textarea" placeholder="Коментар" name="Order[text]"
                              id="Order_text"></textarea>
                    <div class="errorMessage" id="Order_text_em_" style="display:none"></div>
                    <div class="of-form__text"><span></span>Поля, обов’язкові для заповнення</div>
                    <a href="javascript:" class="of-submit of-submit-form">
                        Замовити
                    </a>
                </div>
            </form>
        </div>
        <div class="of-form form-thanks clearfix">
            <a href="javascript:;" class="of-close"></a href="">
            <div class="of-form__thanks">
                <span>Дякуємо</span><br>
                Ми з Вами зв’яжемось<br>найближчим часом
            </div>
        </div>
    </div>
</section>
<?php $this->endBody() ?>
</body>
</html>
<?php $this->endPage() ?>
