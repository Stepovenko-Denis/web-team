<?php


namespace app\models\readModels;


use app\models\entities\NewsView;
use yii\data\ActiveDataProvider;
use yii\db\ActiveQuery;

class NewsViewReadRepository
{
    public function getAll()
    {
        $query = NewsView::find();
        return $this->getProvider($query);
    }

    private function getProvider(ActiveQuery $query)
    {
        return new ActiveDataProvider([
            'query' => $query,
            'sort' => [
                'defaultOrder' => [
                    'date' => SORT_DESC,
                    'news_id' => SORT_ASC
                ],
            ],
            'pagination' => [
                'pageSize' => 10,
            ]
        ]);
    }

}