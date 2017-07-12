<?php

use yii\widgets\Breadcrumbs;

print Breadcrumbs::widget([
    'activeItemTemplate' => '<span>{link}</span>',
    'itemTemplate' => '{link}',
    'links' => isset($this->params['breadcrumbs']) ? $this->params['breadcrumbs'] : [],
    'options' => ['class' => 'breadchambs'],
    'tag' => 'div',
]);