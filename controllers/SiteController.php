<?php

namespace app\controllers;

use app\models\readModels\NewsReadRepository;
use app\models\readModels\NewsViewReadRepository;
use app\models\services\NewsViewService;
use Yii;
use yii\web\Controller;


class SiteController extends Controller
{
    private $news;
    private $viewsSerivice;
    private $views;

    public function __construct($id, $module,
                                NewsReadRepository $news,
                                NewsViewService $viewService,
                                NewsViewReadRepository $views,
                                array $config = []
    ) {
        $this->viewsSerivice = $viewService;
        $this->news = $news;
        $this->views = $views;
        parent::__construct( $id, $module, $config );
    }

    public function actionIndex()
    {
        Yii::$app->session->set('click', false);

        $news = $this->news->getAll();
        return $this->render('index', compact('news'));
    }

    public function actionNews($id)
    {
        $news = $this->news->getById($id);

        if (!Yii::$app->session->get('click')) {
            $this->viewsSerivice->view($id);
        }
        Yii::$app->session->set('click', true);
        return $this->render('news', compact('news'));
    }

    public function actionStats()
    {
        $dataProvider = $this->views->getAll();
        return $this->render('stats', compact('dataProvider'));
    }
}
