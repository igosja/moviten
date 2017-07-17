<?php

/**
 * @var $a_portfoliocategory array
 * @var $dataProvider \yii\debug\models\timeline\DataProvider
 * @var $model \common\models\Portfolio
 * @var $searchModel \backend\models\PortfolioSearch
 * @var $this \yii\web\View
 */

use lo\widgets\Toggle;
use yii\grid\GridView;
use yii\helpers\ArrayHelper;
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
                'h1',
                [
                    'attribute' => 'portfoliocategory_id',
                    'filter' => Html::activeDropDownList(
                        $searchModel,
                        'portfoliocategory_id',
                        ArrayHelper::map($a_portfoliocategory, 'id', 'h1'),
                        ['class' => 'form-control', 'prompt' => 'Выбрать все']
                    ),
                    'value' => function ($model) {
                        return $model->portfoliocategory->h1;
                    }
                ],
                [
                    'attribute' => 'status',
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
                ]
            ];

            ?>
            <?= GridView::widget([
                'columns' => $columns,
                'dataProvider' => $dataProvider,
                'filterModel' => $searchModel,
                'tableOptions' => ['class' => 'table table-striped'],
            ]); ?>
        </div>
    </div>
</div>