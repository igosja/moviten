<?php

namespace backend\models;

use common\models\PortfolioImage;
use yii\data\ActiveDataProvider;

class PortfolioImageSearch extends PortfolioImage
{
    public function rules()
    {
        return [
            [['portfolio_id'], 'integer'],
        ];
    }

    public function search($params)
    {
        $query = PortfolioImage::find();
        $dataProvider = new ActiveDataProvider([
            'query' => $query,
            'sort' => ['defaultOrder' => ['order' => SORT_ASC]]
        ]);
        $this->load($params);
        if (!$this->validate()) {
            return $dataProvider;
        }
        $query->andFilterWhere([
            'portfolio_id' => $this->portfolio_id,
        ]);

        return $dataProvider;
    }
}
