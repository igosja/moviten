<?php

namespace backend\models;

use common\models\Slide;
use yii\data\ActiveDataProvider;

class SlideSearch extends Slide
{
    public function search($params)
    {
        $query = Slide::find();
        $dataProvider = new ActiveDataProvider([
            'query' => $query,
            'sort' => ['defaultOrder' => ['order' => SORT_ASC]],
        ]);
        $this->load($params);
        if (!$this->validate()) {
            return $dataProvider;
        }

        return $dataProvider;
    }
}
