<?php

/* @var $this yii\web\View */
/* @var $name string */
/* @var $message string */
/* @var $exception Exception */

use yii\helpers\Html;

$this->title = 'Упс, ошибка(';
?>
<div class="site-error">

    <h1><?= $this->title ?></h1>

    <div class="alert alert-danger">
        <p><b><?= nl2br(Html::encode($message)) ?></b></p>
        <p>
            Как всегда что то пошло не так. Но ты не огорчайся, просто вернись на <a href="/"
                                                                                     style="color: inherit; text-decoration: underline">главную</a>.
        </p>
        <p>
            Но если это что то важное, напиши, пожалуйста, мне на почту <a href="mailto:a-potap@mail.ru"
                                                                           style="font-weight: bold; color: inherit; text-decoration: underline">a-potap@mail.ru</a>
        </p>
    </div>
</div>
