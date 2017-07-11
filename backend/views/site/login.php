<?php

/**
 * @var $form yii\bootstrap\ActiveForm
 * @var $model \common\models\LoginForm
 * @var $this yii\web\View
 */

use yii\bootstrap\ActiveForm;
use yii\helpers\Html;

?>
<div class="site-login">
    <h1><?= Html::encode($this->title) ?></h1>
    <div class="row">
        <div class="col-lg-5">
            <?php $form = ActiveForm::begin(['id' => 'login-form']); ?>
                <?= $form->field($model, 'username')->textInput(['autofocus' => true]) ?>
                <?= $form->field($model, 'password')->passwordInput() ?>
                <?= $form->field($model, 'rememberMe')->checkbox() ?>
                <div class="form-group">
                    <?= Html::submitButton('Войти', ['class' => 'btn btn-default']) ?>
                </div>
            <?php ActiveForm::end(); ?>
        </div>
    </div>
</div>
