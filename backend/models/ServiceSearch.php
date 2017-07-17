<?php

namespace backend\models;

use common\models\Service;
use yii\data\ActiveDataProvider;

class ServiceSearch extends Service
{
    public function search($params)
    {
        $query = Service::find();
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
