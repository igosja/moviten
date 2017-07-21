<?php

/**
 * @var $content string
 * @var $this \yii\web\View
 */

use common\models\Contact;
use frontend\models\OrderForm;
use frontend\assets\AppAsset;
use yii\helpers\Html;
use yii\widgets\ActiveForm;

AppAsset::register($this);

$contact = Contact::findOne(1);
$model = new OrderForm();

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
<script>
    (function(i,s,o,g,r,a,m){i['GoogleAnalyticsObject']=r;i[r]=i[r]||function(){
        (i[r].q=i[r].q||[]).push(arguments)},i[r].l=1*new Date();a=s.createElement(o),
        m=s.getElementsByTagName(o)[0];a.async=1;a.src=g;m.parentNode.insertBefore(a,m)
    })(window,document,'script','https://www.google-analytics.com/analytics.js','ga');

    ga('create', 'UA-102977086-1', 'auto');
    ga('send', 'pageview');

</script>
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
                    <a href="javascript:">
                        <?= $contact['phone_1']; ?>
                    </a>
                    <a href="javascript:">
                        <?= $contact['phone_2']; ?>
                    </a>
                </div>
                <div class="header-top__right clearfix">
                    <div class="header-email">
                        E-mail:
                        <a href="javascript:"><?= $contact['email']; ?></a>
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
                    <a href="javascript:">
                        <?= $contact['phone_1']; ?>
                    </a>
                    <a href="javascript:">
                        <?= $contact['phone_2']; ?>
                    </a>
                </div>
                <a href="javascript:" class="footer-mail">
                    <?= $contact['email']; ?>
                </a>
            </div>
            <a href="javascript:" class="to-top">Вверх</a>
        </div>
        <div class="footer-info clearfix">
            <div class="footer-info__copy">
                © 2000—<?= date('Y'); ?> «Мовитен» строительноство и ремонтные работы
            </div>
        </div>
    </div>
</footer>
<section class="overlay-forms">
    <div class="form-overlay"></div>
    <div class="wrap">
        <div class="of-form form-order clearfix">
            <a href="javascript:" class="of-close"></a>
            <?php $form = ActiveForm::begin([
                'action' => ['site/index'],
                'fieldConfig' => ['template' => "{input}{error}"],
            ]); ?>
            <div class="of-form__title">Заказ услуги</div>
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
                <?= $form->field($model, 'text')->textarea(
                    ['class' => 'of-form__textarea', 'placeholder' => 'Коментарий']
                ); ?>
                <div class="of-form__text"><span></span>Поля, обязательные для заполнения</div>
                <?= Html::submitButton('', ['class' => 'hidden', 'id' => 'submit-button-service']); ?>
                <a href="javascript:" class="of-submit of-submit-form">
                    Заказать
                </a>
            </div>
            <?php ActiveForm::end(); ?>
        </div>
        <?php if (Yii::$app->session->hasFlash('thanks')) { ?>
        <?php Yii::$app->session->getFlash('thanks'); ?>
            <div class="of-form form-thanks clearfix" id="form-success">
                <a href="javascript:" class="of-close"></a>
                <div class="of-form__thanks">
                    <span>Спасибо</span><br>
                    Ми с Вами свяжемся<br>в ближаещее время
                </div>
            </div>
        <?php } ?>
    </div>
</section>
<?php $this->endBody() ?>
</body>
</html>
<?php $this->endPage() ?>
