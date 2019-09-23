<?php

namespace app\modules\api\controllers;

use yii\filters\Cors;
use yii\helpers\ArrayHelper;
use yii\helpers\Url;
use yii\rest\Controller;

class DefaultController extends Controller
{
    public function behaviors()
    {
        return ArrayHelper::merge([
            [
                'class' => Cors::class,
            ],
        ], parent::behaviors());
    }

    public function actionIndex()
    {
        return [
            'info' => 'Potapov Alexey site.',
            'version' => '0.1',
            '_links' => [
                'blog' => Url::to(['/api/post'], true),
                'photo' => Url::to(['/api/photo'], true),
                'resume' => Url::to(['resume'], true),
                'music' => Url::to(['music'], true),
            ]
        ];
    }

    public function actionError()
    {
        if ($error = \Yii::$app->errorHandler->exception)
            return [
                "message" => $error->getMessage(),
                "code" => 0,
                "status" => $error->statusCode,
            ];
    }

    public function actionResume()
    {
        return [
            'text' => $this->renderPartial('@app/views/site/resume')
        ];
    }

    public function actionMusic()
    {
        return [
            'info' => 'My tracks',
            'files' => [
                ['title' => 'africanskye gluky', 'file' => 'http://a-potap.ru/albums/mus/mytracs/africanskye gluky.mp3'],
                ['title' => 'capability', 'file' => 'http://a-potap.ru/albums/mus/mytracs/capability.mp3'],
                ['title' => 'cosmic trash', 'file' => 'http://a-potap.ru/albums/mus/mytracs/cosmic trash.mp3'],
                ['title' => 'easy rock', 'file' => 'http://a-potap.ru/albums/mus/mytracs/easy rock.mp3'],
                ['title' => 'fgh', 'file' => 'http://a-potap.ru/albums/mus/mytracs/fgh.mp3'],
                ['title' => 'grey day', 'file' => 'http://a-potap.ru/albums/mus/mytracs/grey day.mp3'],
                ['title' => 'happy ufo', 'file' => 'http://a-potap.ru/albums/mus/mytracs/happy_ufo.mp3'],
                ['title' => 'i need you', 'file' => 'http://a-potap.ru/albums/mus/mytracs/i need you.mp3'],
                ['title' => 'i whont be with you', 'file' => 'http://a-potap.ru/albums/mus/mytracs/i whont be with you.mp3'],
                ['title' => 'listen to me, looking at me', 'file' => 'http://a-potap.ru/albums/mus/mytracs/listen_to_me,_looking_at_me.mp3'],
                ['title' => 'you_v got my hart', 'file' => 'http://a-potap.ru/albums/mus/mytracs/you_v got my hart.mp3'],
            ]
        ];
    }
}
