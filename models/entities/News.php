<?php

namespace app\models\entities;

use Yii;

/**
 * This is the model class for table "news".
 *
 * @property integer $id
 * @property string $text
 *
 * @property Click[] $clicks
 */
class News extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return '{{%news}}';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['text'], 'string'],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'text' => 'Text',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getClicks()
    {
        return $this->hasMany(Click::className(), ['news_id' => 'id']);
    }
}
