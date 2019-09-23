<?php

namespace app\models;

/**
 * This is the model class for table "news".
 *
 * @property int $id
 * @property string $date
 * @property string $text
 * @property string $text_en
 */
class News extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'news';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['date', 'text'], 'required'],
            [['date'], 'safe'],
            [['text_en'], 'string'],
            [['text'], 'string', 'max' => 200],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'date' => 'Date',
            'text' => 'Text',
            'text_en' => 'Text En',
        ];
    }
}
