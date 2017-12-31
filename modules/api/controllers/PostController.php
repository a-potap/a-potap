<?php

namespace app\modules\api\controllers;

use app\models\BlogComents;
use yii\data\ActiveDataProvider;
use yii\rest\ActiveController;
use yii\web\ForbiddenHttpException;

/**
 * Default controller for the `api` module
 */
class PostController extends ActiveController
{
    public $modelClass = 'app\models\Blog';

    public function checkAccess($action, $model = null, $params = [])
    {
        if ($action == 'create' || $action == 'update' || $action == 'delete') {
            throw new ForbiddenHttpException('No such action');
        }
    }

    public function actionComments($id)
    {
        return new ActiveDataProvider([
            'query' => BlogComents::find()->where(['idpost' => $id]),
            'pagination' => [
                'pageSize' => 10,
            ],
            'sort' => [
                'defaultOrder' => [
                    'date' => SORT_DESC,
                ]
            ],
        ]);
    }
}
