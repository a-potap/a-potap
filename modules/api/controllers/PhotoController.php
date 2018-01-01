<?php

namespace app\modules\api\controllers;

use app\models\PhotoAlbume;
use yii\rest\Controller;
use yii\web\NotFoundHttpException;


class PhotoController extends Controller
{
    public $modelClass = 'app\models\PhotoAlbume';

    public function actions()
    {
        return [
            'index' => [
                'class' => 'app\modules\api\actions\IndexAction',
                'modelClass' => $this->modelClass,
                'defaultOrder' => ['date_create' => SORT_DESC]
            ],
        ];
    }

    public function actionView($id)
    {
        $album = PhotoAlbume::find()->where(['folder' => $id])->one();

        if (is_null($album)) {
            throw new NotFoundHttpException('Альбом не найден');
        }

        return $album;
    }

}