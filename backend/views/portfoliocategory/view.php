<?php

/**
 * @var $model \common\models\PortfolioCategory
 * @var $this \yii\web\View
 */

use yii\helpers\Html;
use yii\widgets\DetailView;

?>
<div class="site-index">
    <div class="row">
        <div class="col-lg-12 text-center">
            <h1 class="page-header"><?= Html::encode($this->title) ?></h1>
        </div>
    </div>
    <ul class="list-inline preview-links text-center">
        <li>
            <?= Html::a(
                'Редактировать',
                ['update', 'id' => $model->primaryKey],
                ['class' => 'btn btn-default']
            ); ?>
        </li>
    </ul>
    <div class="row">
        <div class="col-lg-12">
            <?php

            $attributes = [
                'h1',
                'url',
                'seo_title',
                'seo_description',
                'seo_keywords',
            ];

            ?>
            <?= DetailView::widget([
                'attributes' => $attributes,
                'model' => $model,
                'template' => '<tr><th class="col-lg-6">{label}</th><td>{value}</td></tr>',
            ]); ?>
        </div>
    </div>
</div>