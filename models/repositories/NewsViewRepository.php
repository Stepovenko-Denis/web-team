<?php

namespace app\models\repositories;

use app\models\entities\NewsView;

class NewsViewRepository
{
    public function getBy(array $condition)
    {
        if (!$view = NewsView::find()->andWhere($condition)->limit(1)->one()) {
            return false;
        }
        return $view;
    }

    public function save(NewsView $view)
    {
        return $view->save(false);
    }
}