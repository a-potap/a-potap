<?php

namespace app\models;

/**
 * This is the model class for table "blog_coments".
 *
 * @property integer $id
 * @property integer $idpost
 * @property string $iduser
 * @property string $date
 * @property string $text
 */
class BlogComents extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'blog_coments';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['idpost', 'iduser', 'text'], 'required'],
            [['idpost'], 'integer'],
            [['text'], 'string'],
            [['iduser'], 'string', 'max' => 10],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'idpost' => 'Idpost',
            'iduser' => 'Ник',
            'date' => 'Date',
            'text' => 'Коментарий',
        ];
    }
}
