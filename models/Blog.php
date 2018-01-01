<?php

namespace app\models;

use yii\helpers\Url;
use yii\web\Link;
use yii\web\Linkable;

/**
 * This is the model class for table "blog".
 *
 * @property integer $id
 * @property integer $iduser
 * @property string $date
 * @property string $text
 * @property string $title
 */
class Blog extends \yii\db\ActiveRecord implements Linkable
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

    public function getCompiled_text()
    {
        return preg_replace("/(\{\-\-picfiledir?)(.*?)(\*\*.*--}?)/u", '<img src="/filedir$2" class="img-responsive">', $this->text);
    }

    public function getComments()
    {
        return $this->hasMany(BlogComents::className(), ['idpost' => 'id']);
    }

    public function fields()
    {
        return [
            'id',
            'date',
            'title',
        ];
    }

    public function extraFields()
    {
        return [
            'text' => 'compiled_text',
            'comments'
        ];
    }

    public function getLinks()
    {
        return [
            Link::REL_SELF => Url::to('post/view/' . $this->id . '?expand=text,comments', true),
            'index' => Url::to(['index'], true),
            'comments' => Url::to(['comments', 'id' => $this->id], true),
        ];
    }
}