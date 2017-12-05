<?php

namespace app\controllers;

use app\models\readRepositories\NewsReadRepository;
use Yii;
use yii\filters\AccessControl;
use yii\web\Controller;
use yii\web\Response;
use yii\filters\VerbFilter;
use app\models\LoginForm;
use app\models\ContactForm;

class SiteController extends Controller
{
    private $news;

    public function __construct($id, $module, NewsReadRepository $news, array $config = [])
    {
        $this->news = $news;
        parent::__construct( $id, $module, $config );
    }

    public function actionIndex()
    {
        $news = $this->news->getAll();
        return $this->render('index', compact('news'));
    }

    public function actionNews($id)
    {

    }

    public function actionStats()
    {
        return $this->render('stats');
    }
}
