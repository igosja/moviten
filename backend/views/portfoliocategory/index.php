<?php

/**
 * @var $dataProvider \yii\debug\models\timeline\DataProvider
 * @var $model \common\models\PortfolioCategory
 * @var $this \yii\web\View
 */

use lo\widgets\Toggle;
use yii\grid\GridView;
use yii\helpers\Html;
use yii\helpers\Url;

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
                'Создать',
                ['update'],
                ['class' => 'btn btn-default']
            ); ?>
        </li>
    </ul>
    <div class="row">
        <div class="col-lg-12">
            <?php

            $columns = [
                [
                    'attribute' => 'h1',
                    'enableSorting' => false,
                    'format' => 'raw',
                    'value' => function ($model) {
                        return '<span
                                class="glyphicon glyphicon-resize-vertical text-primary"
                                data-url="' . Url::to(['order', 'id' => $model->primaryKey]) . '"></span> '
                            . $model['h1'];
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
                                'data-url' => Url::to(['status', 'id' => $model->primaryKey]),
                            ]
                        ]);
                    }
                ],
                [
                    'class' => 'yii\grid\ActionColumn',
                    'headerOptions' => ['class' => 'col-lg-1'],
                    'template' => '{view} {update}',
                ]
            ];

            ?>
            <?= GridView::widget([
                'columns' => $columns,
                'dataProvider' => $dataProvider,
                'rowOptions' => function ($model) {
                    return ['data-url' => Url::to(['order', 'id' => $model->primaryKey])];
                },
                'summary' => false,
                'tableOptions' => ['class' => 'table table-striped sorting-table'],
            ]); ?>
        </div>
    </div>
</div>