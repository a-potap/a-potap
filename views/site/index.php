<?php

/* @var $this yii\web\View */

$this->title = 'a-potap';
?>
<div class="site-index">

    <div class="jumbotron">
        <h1>Потапов Алексей Федорович!</h1>

        <p class="lead">
            Добро пожаловать на мой сайт, рад тебя здесь видеть.
        </p>
    </div>

    <div class="body-content">
        <div class="row">
            <div class="col-sm-6">
                <h2>Немного о себе</h2>

                <p>
                    Люблю: кататься на велике, путешествовать, сочинять музыку,общаться с друзьями и просто с пользой проводить время. Работаю в сфере веб-программирования. Увлекаюсь всем по немногу.
                </p>

                <h2>Что можно найти</h2>

                <p>
                    Этот сайт я открыл прежде всего для своих друзей и знакомых. Здесь выкладываю своё творчество: фото, видео, и рассказываю (блог) о своих увлечениях. В разделе "Music" лежит альбом с моими терками, которые я выкладываю на PROMO_DJ
                </p>

                <p>
                    Кроме этого сайт будет полезен работодателям и коллегам: здесь я выкладываю примеры своих работ, скрипты и др.
                </p>
            </div>
            <div class="col-sm-6">
                <h2>Свежачок</h2>

                <div class="news">
                    <?= \yii\widgets\ListView::widget([
                        'dataProvider' => new \yii\data\ActiveDataProvider([
                            'query' => \app\models\News::find()->orderBy(['id' => SORT_DESC]),
                            'pagination' => [
                                'pageSize' => 7
                            ],
                        ]),
                        'layout' =>  "{items}",
                        'itemView' => '_news',
                        'emptyText' => 'Ещё нет новостей'
                    ]);?>
                </div>
            </div>
        </div>
    </div>
</div>
