<?php

/* @var $this yii\web\View */

$this->title = 'Блог Потапова Алексея';

$this->registerMetaTag([
    'name' => 'description',
    'content' => 'Potapov Alexey\'s blog. Here I post mainly reports, photos about my travels and some thoughts about everything.',
], 'description');
$this->registerMetaTag([
    'name' => 'keywords',
    'content' => 'Potapov Alexey\'s blog, travel, photos about his travels, videos, photos',
], 'keywords');

?>
<div class="site-index">

    <div class="jumbotron text-right">
        <h1>This is Potapov Alexey's blog!</h1>

        <p class="lead">
            Welcome to my site, I'm glad to see you here
        </p>

        <p>
            <br>
            <br>
            <a href="">The best journeys are not always in straight lines.</a>
    </div>

    <div class="body-content">
        <div class="row">
            <div class="col-sm-6">
                <h2>About me </h2>

                <p>
                    I like to ride a bike, travel, chat with friends and just usefully spend time. I work in the field of web programming. I like to read dystopias.
                </p>

                <h2>What can be found here</h2>

                <p>
                    I opened this site primarily for my friends and acquaintances. Here I spread mainly reports about my travels, photos and some thoughts about everything.
                </p>

                <p>
                    I think that the best thing about a person is his work. Therefore, there is only what I did myself.
                </p>

                <p>
                    Leave a comment, if you like a story, this is the best motivation for me to write more!
                </p>
            </div>

            <div class="col-sm-6">
                <h2>News</h2>

                <div class="news">
                    <?= \yii\widgets\ListView::widget([
                        'dataProvider' => $newsDataProvider,
                        'layout' =>  "{items}",
                        'itemView' => '_news',
                        'emptyText' => 'There is no news yet'
                    ]);?>
                </div>
            </div>
        </div>
    </div>
</div>
