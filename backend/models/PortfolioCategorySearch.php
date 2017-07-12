<?php

namespace backend\models;

use common\models\PortfolioCategory;
use yii\data\ActiveDataProvider;

class PortfolioCategorySearch extends PortfolioCategory
{
    public function search($params)
    {
        $query = PortfolioCategory::find();
        $dataProvider = new ActiveDataProvider([
            'query' => $query,
            'sort' => ['defaultOrder' => ['order' => SORT_ASC]]
        ]);
        $this->load($params);
        if (!$this->validate()) {
            return $dataProvider;
        }

        return $dataProvider;
    }
}
