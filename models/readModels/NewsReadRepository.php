<?php

namespace app\models\readRepositories;

use app\models\entities\News;

class NewsReadRepository
{
    public function getAll()
    {
        return News::find()->all();
    }
}