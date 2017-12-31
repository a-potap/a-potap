<?php

namespace app\controllers;

use app\models\PhotoAlbume;
use yii\web\NotFoundHttpException;

class PhotoController extends \yii\web\Controller
{
    public function actionIndex()
    {
        return $this->render('index', [
            'albums' => PhotoAlbume::find()->all()
        ]);
    }

    public function actionView($id){

        $album = PhotoAlbume::find()->where(['folder' => $id])->one();

        if (is_null($album)) {
            throw new NotFoundHttpException('Альбом не найден');
        }

        return $this->render('view', [
            'album' => $album,
        ]);
    }
}
