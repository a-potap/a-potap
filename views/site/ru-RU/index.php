<?php

/* @var $this yii\web\View */

$this->title = 'Блог Потапова Алексея';

$this->registerMetaTag([
    'name' => 'description',
    'content' => 'Блог Потапова Алексея. Здесь выкладываю в основном отчеты, фотографии о своих путешествиях и некоторые мысли обо всем.',
], 'description');
$this->registerMetaTag([
    'name' => 'keywords',
    'content' => 'Блог Потапова Алексея, путешествовать, фотографии о своих путешествиях, видео, фото',
], 'keywords');

?>
<div class="site-index">

    <div class="jumbotron text-right">
        <h1>Блог Потапова Алексея</h1>

        <p class="lead">
            Добро пожаловать на мой сайт, рад тебя здесь видеть.
        </p>

        <p>
            <br>
            <br>
            <a href="">Предел совершенства, только наше представление об этом пределе.</a>
    </div>

    <div class="body-content">
        <div class="row">
            <div class="col-sm-6">
                <h2>Немного о себе</h2>

                <p>
                    Люблю: кататься на велике, путешествовать, общаться с друзьями и просто с пользой проводить время. Работаю в сфере веб-программирования. Увлекаюсь всем по немногу.
                </p>

                <h2>Что можно найти</h2>

                <p>
                    Этот сайт я открыл прежде всего для своих друзей и знакомых.
                    Здесь выкладываю в основном отчеты, фотографии о своих путешествиях и некоторые мысли обо всем.
                </p>

                <p>
                    Думаю, что лучше всего о человеке рассказывает его творчество.
                    Поэтому тут только то, что я сделал сам.
                    В разделе "Music" лежит альбом терками. Так же можно найти видео и фото.
                </p>

                <p>
                    Оставьте комментарий, если вам понравится какой либо рассказ, это самая лучшая мотивация для меня
                    писать ещё!
                </p>
            </div>

            <div class="col-sm-6">
                <h2>Свежачок</h2>

                <div class="news">
                    <?= \yii\widgets\ListView::widget([
                        'dataProvider' => $newsDataProvider,
                        'layout' =>  "{items}",
                        'itemView' => '_news',
                        'emptyText' => 'Ещё нет новостей'
                    ]);?>
                </div>
            </div>
        </div>
    </div>
</div>