<?php

namespace app\controllers;

use yii\web\BadRequestHttpException;

class PhotoController extends \yii\web\Controller
{
    private $basedir = 'albums/foto/';
    private $fileextentions = ['JPG', 'jpg', 'gif'];
    private $_infofile = 'info.txt';
    private $_facefile = 'fase.JPG';

    private function getAlbums(){

        $cbasedir=opendir($this->basedir);

        $Albums=array();
        while (($albumDir=readdir($cbasedir))!==false){

            $a_PasInf = $this->basedir.$albumDir.'/';
            if (file_exists($a_PasInf.$this->_infofile)){
                $a_FileParam = $this->getAlbumInfo($a_PasInf.$this->_infofile);
                $Albums[] = array('name'=>$a_FileParam['name'], 'date'=>$a_FileParam["date"], 'album'=>$albumDir);
            };
        };
        //print_r($Albums);
        if (count($Albums)>0) return $Albums;
        else return false;
    }

    private function getAlbumInfo($fileInfo)	{
        if (file_exists($fileInfo))
        {
            $a_rednFile = file($fileInfo);
            foreach ($a_rednFile as $a_i=>$a_str){
                $a_rStr = substr($a_str,0,strpos($a_str,":"));
                switch ($a_rStr)
                {
                    case "name" : $param["name"] = substr($a_str,strpos($a_str,":")+1,strlen($a_str)); break;
                    case "date" : $param["date"] = substr($a_str,strpos($a_str,":")+1,strlen($a_str)); break;
                    case "test" : $param["test"] = substr($a_str,strpos($a_str,":")+1,strlen($a_str)); break;
                    case "count": $param["count"]= substr($a_str,strpos($a_str,":")+1,strlen($a_str)); break;
                };
            };
            return $param;
        };
    }

    private function getFiles($a_album){
        $files = [];
        $a_cur_dir = $this->basedir.$a_album;
        if ($handledir = opendir($a_cur_dir)){
            while (false !== ($file = readdir($handledir))){
                if (!(($file == ".") ||
                        ($file == "..") ||
                        ($file == $this->_infofile) ||
                        ($file == $this->_facefile)
                    )&&
                    in_array(substr($file,strlen($file)-3, 3), $this->fileextentions)
                )
                    $files[]=["file"=>$file, "path"=>'/'.$a_cur_dir."/".$file, 'name'=> substr($file,0, strlen($file)-4)];
            }
        }
        //var_dump($handledir); exit;
        closedir($handledir);

        usort($files, function ($v1, $v2){
            if ($v1["file"] == $v2["file"]) return 0;
            return ($v1["file"] < $v2["file"])? -1: 1;
        });

        return $files;
    }

    public function actionIndex()
    {
        return $this->render('index', [
            'albums'=>$this->getAlbums()
        ]);
    }

    public function actionView($id){
        if (isset($_GET['id'])){
            $files = $this->getFiles($id);
            if (count($files)>0)
                return $this->render('view',[
                    'content'=>$files,
                    'album_info'=>$this->getAlbumInfo($this->basedir.$id.'/'.$this->_infofile),
                ]);
            else
                throw new BadRequestHttpException('Invalid request or no items to display. Please do not repeat this request again.', 400);
        }
        else
            $this->redirect(array('index', ));
    }


}
