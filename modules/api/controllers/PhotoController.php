<?php

namespace app\modules\api\controllers;

use app\models\PhotoAlbume;
use yii\rest\ActiveController;
use yii\web\NotFoundHttpException;


class PhotoController extends ActiveController
{
    public $modelClass = 'app\models\PhotoAlbume';

    public function actions()
    {
        return [
            'index' => [
                'class' => 'yii\rest\IndexAction',
                'modelClass' => $this->modelClass,
                'checkAccess' => [$this, 'checkAccess'],
            ],
//            'view' => [
//                'class' => 'yii\rest\ViewAction',
//                'modelClass' => $this->modelClass,
//                'checkAccess' => [$this, 'checkAccess'],
//            ],
//            'create' => [
//                'class' => 'yii\rest\CreateAction',
//                'modelClass' => $this->modelClass,
//                'checkAccess' => [$this, 'checkAccess'],
//                'scenario' => $this->createScenario,
//            ],
//            'update' => [
//                'class' => 'yii\rest\UpdateAction',
//                'modelClass' => $this->modelClass,
//                'checkAccess' => [$this, 'checkAccess'],
//                'scenario' => $this->updateScenario,
//            ],
//            'delete' => [
//                'class' => 'yii\rest\DeleteAction',
//                'modelClass' => $this->modelClass,
//                'checkAccess' => [$this, 'checkAccess'],
//            ],
//            'options' => [
//                'class' => 'yii\rest\OptionsAction',
//            ],
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