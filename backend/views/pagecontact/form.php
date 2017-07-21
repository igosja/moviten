<?php

/**
 * @var $model \common\models\PageService
 * @var $this \yii\web\View
 */

use yii\bootstrap\ActiveForm;
use yii\helpers\Html;

?>
<div class="site-index">
    <div class="row">
        <div class="col-lg-12 text-center">
            <h1 class="page-header"><?= Html::encode($this->title) ?></h1>
        </div>
    </div>
    <div class="row">
        <div class="col-lg-12">
            <?php $form = ActiveForm::begin([
                'fieldConfig' => [
                    'template' => "{label}\n<div class=\"col-lg-9\">{input}</div>\n<div class=\"col-lg-offset-3 col-lg-9\">{error}</div>",
                    'labelOptions' => ['class' => 'col-lg-3 control-label'],
                ],
                'options' => ['class' => 'form-horizontal'],
            ]); ?>
            <?= $form->field($model, 'address_1')->textInput(); ?>
            <?= $form->field($model, 'address_2')->textInput(); ?>
            <?= $form->field($model, 'address_3')->textInput(); ?>
            <?= $form->field($model, 'email')->textInput(); ?>
            <?= $form->field($model, 'google_lat')->textInput(); ?>
            <?= $form->field($model, 'google_lng')->textInput(); ?>
            <?= $form->field($model, 'h1')->textInput(); ?>
            <?= $form->field($model, 'phone_1')->textInput(); ?>
            <?= $form->field($model, 'phone_2')->textInput(); ?>
            <?= $form->field($model, 'shedule_mn')->textInput(); ?>
            <?= $form->field($model, 'shedule_st')->textInput(); ?>
            <?= $form->field($model, 'shedule_sn')->textInput(); ?>
            <?= $form->field($model, 'seo_title')->textInput(); ?>
            <?= $form->field($model, 'seo_description')->textarea(); ?>
            <?= $form->field($model, 'seo_keywords')->textarea(); ?>
            <div class="form-group">
                <div class="col-lg-12 text-center">
                    <?= Html::submitButton('Сохранить', ['class' => 'btn btn-default']) ?>
                </div>
            </div>
            <?php ActiveForm::end(); ?>
        </div>
    </div>
</div>