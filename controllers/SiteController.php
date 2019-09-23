<?php

namespace app\controllers;

use yii\web\Controller;

class SiteController extends Controller
{
    /**
     * @inheritdoc
     */
    public function actions()
    {
        return [
            'error' => [
                'class' => 'yii\web\ErrorAction',
            ],
            'captcha' => [
                'class' => 'yii\captcha\CaptchaAction',
                'fixedVerifyCode' => YII_ENV_TEST ? 'testme' : null,
            ],
        ];
    }

    /**
     * Displays homepage.
     *
     * @return string
     */
    public function actionIndex()
    {
        $query = \app\models\News::find()->orderBy(['id' => SORT_DESC]);
        if (\Yii::$app->language == 'en-US') {
            $query->where('text_en is not null');
        }

        $newsDataProvider = new \yii\data\ActiveDataProvider([
            'query' => $query,
            'pagination' => [
                'pageSize' => 7
            ],
        ]);

        return $this->render('index', [
            'newsDataProvider' => $newsDataProvider
        ]);
    }

    /**
     * Displays about page.
     *
     * @return string
     */
    public function actionAbout()
    {
        return $this->render('about');
    }

    public function actionMusic()
    {
        return $this->render('music');
    }

    public function actionResume()
    {
        return $this->render('resume');
    }

    public function actionVideo()
    {
        return $this->render('video');
    }
}
