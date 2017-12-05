<?php

namespace app\models\readModels;

use app\models\entities\News;

class NewsReadRepository
{
    public function getAll()
    {
        return News::find()->all();
    }

    public function getById($id)
    {
        return News::findOne($id);
    }
}