<?php

/**
 * @var $model \common\models\PortfolioCategory
 * @var $this \yii\web\View
 */

use yii\helpers\Html;
use yii\bootstrap\ActiveForm;

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
                    'labelOptions' => ['class' => 'col-lg-3 control-label'],
                    'template' => "{label}\n<div class=\"col-lg-9\">{input}</div>\n<div class=\"col-lg-offset-3 col-lg-9\">{error}</div>",
                ],
                'options' => ['class' => 'form-horizontal'],
            ]); ?>
            <?= $form->field($model, 'h1')->textInput(); ?>
            <?= $form->field($model, 'url')->textInput(); ?>
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