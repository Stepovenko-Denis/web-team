<?php

namespace app\models\services;

use app\models\entities\NewsView;
use app\models\repositories\NewsViewRepository;
use app\models\storage\NewsViewSessionStorage;

class NewsViewService
{
    private $view;
    private $currentDate;
    private $storage;

    public function __construct(
        $currentDate,
        NewsViewRepository $view,
        NewsViewSessionStorage $storage
    ) {
        $this->currentDate = $currentDate;
        $this->view = $view;
        $this->storage = $storage;
    }

    public function view($newsId)
    {
        if (!$view = $this->view->getBy(['news_id' => $newsId, 'date' => $this->currentDate])) {
            $view = NewsView::create($newsId, 'ua', $this->currentDate);
        }

        if ($this->storage->isExist($newsId)) {
            $view->click();
        } else {
            $view->uniqueClick();
        }

        $this->storage->set($newsId);
        $this->view->save($view);
    }
}