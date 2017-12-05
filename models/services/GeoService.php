<?php


namespace app\models\services;


use Yii;

class GeoService
{
    const DEFAULT_CODE = 'ru';

    private $session;

    public function __construct()
    {
        $this->session = Yii::$app->session;
    }

    public function getCountryCode()
    {
        if ($this->session->get('country_code')) {
            return $this->session->get('country_code');
        }

        $code = $this->getCodeOfGeo();

        if (!$code) {
            $code = current(Yii::$app->request->acceptableLanguages);
        }

        $this->session->set('country_code', $code);
        return $code ? $code : self::DEFAULT_CODE;
    }

    private function getCodeOfGeo()
    {
        $data = Yii::$app->geo->getData();
        if (!empty($data)) {
            return strtolower($data['country']);
        }
        return false;
    }
}