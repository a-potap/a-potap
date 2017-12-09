<?php

namespace app\models;

/**
 * This is the model class for table "blog".
 *
 * @property integer $id
 * @property integer $iduser
 * @property string $date
 * @property string $text
 * @property string $title
 */
class Blog extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'blog';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['iduser', 'date', 'text'], 'required'],
            [['iduser'], 'integer'],
            [['date'], 'safe'],
            [['text'], 'string'],
            [['title'], 'string', 'max' => 150],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'iduser' => 'Iduser',
            'date' => 'Date',
            'text' => 'Text',
            'title' => 'Title',
        ];
    }

    public function getComments()
    {
        return $this->hasMany(BlogComents::className(), ['idpost' => 'id']);
    }
}
