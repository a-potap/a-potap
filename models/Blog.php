<?php

namespace app\models;

/**
 * This is the model class for table "blog".
 *
 * @property int $id
 * @property int $iduser
 * @property string $date
 * @property string $text
 * @property string $title
 * @property string $text_en
 * @property string $title_en
 */
class Blog extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'blog';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['iduser', 'date', 'text'], 'required'],
            [['iduser'], 'integer'],
            [['date'], 'safe'],
            [['text', 'text_en'], 'string'],
            [['title', 'title_en'], 'string', 'max' => 150],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'iduser' => 'Iduser',
            'date' => 'Date',
            'text' => 'Text',
            'title' => 'Title',
            'text_en' => 'Text En',
            'title_en' => 'Title En',
        ];
    }


    public function getCompiled_text($text = null)
    {

        return preg_replace(
            "/(\{\-\-picfiledir?)(.*?)(\*\*.*--}?)/u", '<img src="/filedir$2" class="img-responsive">',
            is_null($text) ? $this->text : $text
            );
    }

    public function getComments()
    {
        return $this->hasMany(BlogComents::class, ['idpost' => 'id']);
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
            Link::REL_SELF => Url::to(['post/view/' . $this->id . '?expand=text,comments'], true),
            'index' => Url::to(['index'], true),
            'comments' => Url::to(['comments', 'id' => $this->id], true),
        ];
    }
}
