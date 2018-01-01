<?php

namespace app\models;

use yii\helpers\Url;
use yii\web\Link;
use yii\web\Linkable;

/**
 * This is the model class for table "photo_albume".
 *
 * @property integer $id
 * @property string $date_create
 * @property string $name
 * @property string $description
 * @property string $folder
 */
class PhotoAlbume extends \yii\db\ActiveRecord implements Linkable
{
    private $basedir = 'albums/foto/';
    private $fileextentions = ['JPG', 'jpg', 'gif'];
    private $_facefile = 'fase.JPG';

    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'photo_albume';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['date_create'], 'safe'],
            [['name', 'folder'], 'required'],
            [['name'], 'string', 'max' => 155],
            [['description'], 'string', 'max' => 255],
            [['folder'], 'string', 'max' => 45],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'date_create' => 'Date Create',
            'name' => 'Name',
            'description' => 'Description',
            'folder' => 'Folder',
        ];
    }

    public function fields()
    {
        return [
            'id' => 'id',
            'date_create' => 'date_create',
            'name' => 'name',
            'description' => 'description',
            //'folder' => 'folder',
            'face' => 'face'
        ];
    }

    public function extraFields()
    {
        return [
            'files' => 'files',
        ];
    }

    public function getLinks()
    {
        return [
            Link::REL_SELF => Url::to(['photo/view', 'id' => $this->folder], true),
            'index' => Url::to(['index'], true),
        ];
    }

    public function getFace()
    {
        return $this->basedir . $this->folder . '/' . $this->_facefile;
    }

    public function getFiles()
    {
        $files = [];
        $a_cur_dir = $this->basedir . $this->folder;
        if ($handledir = opendir($a_cur_dir)) {
            while (false !== ($file = readdir($handledir))) {
                if (!(($file == ".") ||
                        ($file == "..") ||
                        ($file == $this->_facefile)
                    ) &&
                    in_array(substr($file, strlen($file) - 3, 3), $this->fileextentions)
                )
                    $files[] = ["file" => $file, "path" => '/' . $a_cur_dir . "/" . $file];
            }
        }
        //var_dump($handledir); exit;
        closedir($handledir);

        usort($files, function ($v1, $v2) {
            if ($v1["file"] == $v2["file"]) return 0;
            return ($v1["file"] < $v2["file"]) ? -1 : 1;
        });

        return $files;
    }

}
