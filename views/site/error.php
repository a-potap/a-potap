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
            Как всегда что то пошло не так. Но ты не огорчайся, все будет отлично, просто вернись на главную.
        </p>
    </div>
</div>
