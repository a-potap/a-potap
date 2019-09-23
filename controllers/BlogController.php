<?php

namespace app\controllers;

use app\models\Blog;
use app\models\BlogComents;
use Yii;
use yii\data\ActiveDataProvider;
use yii\filters\VerbFilter;
use yii\web\Controller;
use yii\web\NotFoundHttpException;

/**
 * BlogController implements the CRUD actions for Blog model.
 */
class BlogController extends Controller
{
    public function behaviors()
    {
        return [
            'verbs' => [
                'class' => VerbFilter::class,
                'actions' => [
                    'delete' => ['POST'],
                ],
            ],
        ];
    }

    public function actionIndex()
    {
        $query = Blog::find();
        if (\Yii::$app->language == 'en-US') {
            $query->where('title_en is not null');
        }

        $dataProvider = new ActiveDataProvider([
            'query' => $query,
            'pagination' => [
                'pageSize' => 10,
            ],
            'sort' => [
                'defaultOrder' => [
                    'date' => SORT_DESC,
                ]
            ],
        ]);

        return $this->render('index', [
            'dataProvider' => $dataProvider,
        ]);
    }

    public function actionView($id)
    {
        return $this->render('view', [
            'model' => $this->findModel($id),
        ]);
    }

    public function actionComment($id)
    {
        if (!Yii::$app->request->isAjax) {
            throw new NotFoundHttpException('Допустимы только аякс запросы.');
        }

        $commentModel = new BlogComents();
        $commentModel->idpost = $id;
        if ($commentModel->load(Yii::$app->request->post()) && $commentModel->save()) {
            return $this->renderAjax('commentSuccess', [
                'model' => $commentModel,
            ]);
        }

        return $this->renderAjax('commentForm', [
            'model' => $commentModel,
        ]);
    }

    protected function findModel($id)
    {
        if (($model = Blog::findOne($id)) !== null) {
            return $model;
        } else {
            throw new NotFoundHttpException('The requested page does not exist.');
        }
    }
}
