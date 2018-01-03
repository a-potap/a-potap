<?php

namespace app\modules\api\controllers;

use app\models\BlogComents;
use yii\data\ActiveDataProvider;
use yii\filters\Cors;
use yii\helpers\ArrayHelper;
use yii\rest\ActiveController;
use yii\web\ForbiddenHttpException;

class PostController extends ActiveController
{
    public $modelClass = 'app\models\Blog';

    public function behaviors()
    {
        return ArrayHelper::merge([
            [
                'class' => Cors::className(),
            ],
        ], parent::behaviors());
    }

    public function actions()
    {
        return [
            'index' => [
                'class' => 'app\modules\api\actions\IndexAction',
                'modelClass' => $this->modelClass,
                'defaultOrder' => ['date' => SORT_DESC],
                'checkAccess' => [$this, 'checkAccess'],
            ],
            'view' => [
                'class' => 'yii\rest\ViewAction',
                'modelClass' => $this->modelClass,
                'checkAccess' => [$this, 'checkAccess'],
            ],
        ];
    }

    public function checkAccess($action, $model = null, $params = [])
    {
        if ($action == 'index' && !is_null(\Yii::$app->request->get('expand'))) {
            throw new ForbiddenHttpException('Parameter "expand" not allowed in this URL');
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
