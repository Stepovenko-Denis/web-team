<?php

namespace app\models\entities;

use Yii;

/**
 * This is the model class for table "clicks".
 *
 * @property integer $id
 * @property integer $news_id
 * @property integer $unique_clicks
 * @property integer $clicks
 * @property string $country_code
 * @property string $date
 *
 * @property News $news
 */
class Click extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return '{{%clicks}}';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['news_id', 'unique_clicks', 'clicks'], 'integer'],
            [['date'], 'safe'],
            [['country_code'], 'string', 'max' => 2],
            [['news_id'], 'exist', 'skipOnError' => true, 'targetClass' => News::className(), 'targetAttribute' => ['news_id' => 'id']],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'news_id' => 'News ID',
            'unique_clicks' => 'Unique Clicks',
            'clicks' => 'Clicks',
            'country_code' => 'Country Code',
            'date' => 'Date',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getNews()
    {
        return $this->hasOne(News::className(), ['id' => 'news_id']);
    }
}
