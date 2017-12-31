<?php

namespace app\modules\api\controllers;

use yii\rest\Controller;

/**
 * Default controller for the `api` module
 */
class DefaultController extends Controller
{
    /**
     * Renders the index view for the module
     * @return string
     */
    public function actionIndex()
    {
        return [
            'version' => '0.1',
            'urls' => [
                'posts' => '/post'
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
}
