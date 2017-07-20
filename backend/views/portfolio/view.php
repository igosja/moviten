<?php

/**
 * @var $dataProvider \backend\models\PortfolioImageSearch
 * @var $model \common\models\Portfolio
 * @var $this \yii\web\View
 */

use lo\widgets\Toggle;
use yii\grid\GridView;
use yii\helpers\Html;
use yii\helpers\Url;
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
                [
                    'attribute' => 'portfoliocategory_id',
                    'value' => function ($model) {
                        return $model->portfoliocategory->h1;
                    },
                ],
                [
                    'attribute' => 'text',
                    'format' => 'raw',
                ],
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
    <div class="row">
        <div class="col-lg-12 text-center">
            <h3 class="page-header">Изображения</h3>
        </div>
    </div>
    <div class="row">
        <div class="col-lg-12">
            <?php

            $columns = [
                [
                    'attribute' => 'image_id',
                    'enableSorting' => false,
                    'format' => 'raw',
                    'value' => function ($model) {
                        return '<div class="row">
                                <div class="col-md-1">
                                <span
                                class="glyphicon glyphicon-resize-vertical text-primary"
                                data-url="' . Url::to(['portfolioimage/order', 'id' => $model->primaryKey]) . '"
                                ></span>
                                </div>
                                <div class="col-md-3">
                                <a href="javascript:" class="thumbnail">
                                <img src="' . $model['image']['url'] . '" />
                                </a>
                                </div>
                                </div>';
                    }
                ],
                [
                    'attribute' => 'status',
                    'enableSorting' => false,
                    'format' => 'raw',
                    'headerOptions' => ['class' => 'col-lg-1'],
                    'value' => function ($model) {
                        return Toggle::widget([
                            'name' => 'status',
                            'checked' => $model['status'],
                            'options' => [
                                'class' => 'ajax-toogle',
                                'data-size' => 'mini',
                                'data-url' => Url::to(['portfolioimage/status', 'id' => $model->primaryKey]),
                            ]
                        ]);
                    }
                ],
                [
                    'class' => 'yii\grid\ActionColumn',
                    'headerOptions' => ['class' => 'col-lg-1'],
                    'template' => '{delete}',
                    'urlCreator' => function ($action, $model, $key, $index) {
                        if ($action === 'delete') {
                            $url = Url::to(['portfolioimage/delete', 'id' => $model['id']]);
                            $asdf = 'index.php?r=client-login/lead-delete&id='.$model->id;
                            return $url;
                        }
                        return '';
                    }
                ]
            ];

            ?>
            <?= GridView::widget([
                'columns' => $columns,
                'dataProvider' => $dataProvider,
                'rowOptions' => function ($model) {
                    return ['data-url' => Url::to(['portfolioimage/order', 'id' => $model->primaryKey])];
                },
                'tableOptions' => ['class' => 'table table-striped sorting-table'],
            ]); ?>
        </div>
    </div>
</div>