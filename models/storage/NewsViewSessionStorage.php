<?php

namespace app\models\storage;

use Yii;

class NewsViewSessionStorage
{
    private $session;

    public function __construct()
    {
        $this->session = Yii::$app->session;
        if (!isset($this->session['news'])) {
            $this->session->set('news', []);
        }
    }

    public function isExist($newsId)
    {
        return (isset($this->session['news'][$newsId])) ? true : false;
    }

    public function set($newsId)
    {
        $session = $this->session->get('news');
        $session[$newsId] = true;
        $this->session->set('news', $session);
    }
}