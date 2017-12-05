<?php

namespace app\bootstrap;

use app\models\repositories\NewsViewRepository;
use app\models\services\NewsViewService;
use app\models\storage\NewsViewSessionStorage;
use yii\base\Application;
use yii\base\BootstrapInterface;

class SetUp implements BootstrapInterface
{

    /**
     * Bootstrap method to be called during application bootstrap stage.
     * @param Application $app the application currently running
     */
    public function bootstrap($app)
    {
        $container = \Yii::$container;

        $container->setSingleton(NewsViewService::class, [], [
            date('Y-m-d'),
            new NewsViewRepository(),
            new NewsViewSessionStorage()
        ]);
    }
}