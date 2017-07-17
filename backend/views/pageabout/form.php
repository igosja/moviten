<?php

/**
 * @var $model \common\models\PageAbout
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
            <?= $form->field($model, 'h1')->textInput(); ?>
            <?= $form->field($model, 'h2')->textInput(); ?>
            <?= $form->field($model, 'h3_1')->textInput(); ?>
            <?= $form->field($model, 'h3_2')->textInput(); ?>
            <?= $form->field($model, 'text_1')->textarea(); ?>
            <?= $form->field($model, 'text_2')->textarea(); ?>
            <?= $form->field($model, 'text_3')->textarea(); ?>
            <?php if ($model['image']['url']) { ?>
                <div class="form-group">
                    <label class="col-lg-3 control-label"><?= $model->getAttributeLabel('upload_image'); ?></label>
                    <div class="col-md-6">
                        <?= Html::a('×', ['image', 'id' => $model->primaryKey], ['class' => 'close', 'title' => 'Удалить']); ?>
                        <img class="img-responsive" src="<?= $model['image']['url']; ?>"/>
                    </div>
                </div>
            <?php } else { ?>
                <?= $form->field($model, 'upload_image')->fileInput(['class' => 'form-control']); ?>
            <?php } ?>
            <?php if ($model['team1']['url']) { ?>
                <div class="form-group">
                    <label class="col-lg-3 control-label"><?= $model->getAttributeLabel('upload_team_1'); ?></label>
                    <div class="col-md-6">
                        <?= Html::a('×', ['team1', 'id' => $model->primaryKey], ['class' => 'close', 'title' => 'Удалить']); ?>
                        <img class="img-responsive" src="<?= $model['team1']['url']; ?>"/>
                    </div>
                </div>
            <?php } else { ?>
                <?= $form->field($model, 'upload_team_1')->fileInput(['class' => 'form-control']); ?>
            <?php } ?>
            <?php if ($model['team2']['url']) { ?>
                <div class="form-group">
                    <label class="col-lg-3 control-label"><?= $model->getAttributeLabel('upload_team_2'); ?></label>
                    <div class="col-md-6">
                        <?= Html::a('×', ['team2', 'id' => $model->primaryKey], ['class' => 'close', 'title' => 'Удалить']); ?>
                        <img class="img-responsive" src="<?= $model['team2']['url']; ?>"/>
                    </div>
                </div>
            <?php } else { ?>
                <?= $form->field($model, 'upload_team_2')->fileInput(['class' => 'form-control']); ?>
            <?php } ?>
            <?php if ($model['team3']['url']) { ?>
                <div class="form-group">
                    <label class="col-lg-3 control-label"><?= $model->getAttributeLabel('upload_team_3'); ?></label>
                    <div class="col-md-6">
                        <?= Html::a('×', ['team3', 'id' => $model->primaryKey], ['class' => 'close', 'title' => 'Удалить']); ?>
                        <img class="img-responsive" src="<?= $model['team3']['url']; ?>"/>
                    </div>
                </div>
            <?php } else { ?>
                <?= $form->field($model, 'upload_team_3')->fileInput(['class' => 'form-control']); ?>
            <?php } ?>
            <?php if ($model['team4']['url']) { ?>
                <div class="form-group">
                    <label class="col-lg-3 control-label"><?= $model->getAttributeLabel('upload_team_4'); ?></label>
                    <div class="col-md-6">
                        <?= Html::a('×', ['team4', 'id' => $model->primaryKey], ['class' => 'close', 'title' => 'Удалить']); ?>
                        <img class="img-responsive" src="<?= $model['team4']['url']; ?>"/>
                    </div>
                </div>
            <?php } else { ?>
                <?= $form->field($model, 'upload_team_4')->fileInput(['class' => 'form-control']); ?>
            <?php } ?>
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