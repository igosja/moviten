<?php

namespace backend\models;

use common\models\Portfolio;
use yii\data\ActiveDataProvider;

class PortfolioSearch extends Portfolio
{
    public function rules()
    {
        return [
            [['h1'], 'string', 'max' => 255],
            [['portfoliocategory_id'], 'integer'],
        ];
    }

    public function search($params)
    {
        $query = Portfolio::find();
        $dataProvider = new ActiveDataProvider([
            'query' => $query
        ]);
        $this->load($params);
        if (!$this->validate()) {
            return $dataProvider;
        }
        $query->andFilterWhere([
            'portfoliocategory_id' => $this->portfoliocategory_id,
        ]);
        $query->andFilterWhere(['like', 'h1', $this->h1]);

        return $dataProvider;
    }
}
