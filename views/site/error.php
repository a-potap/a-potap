<?php

/* @var $this yii\web\View */
/* @var $name string */
/* @var $message string */
/* @var $exception Exception */

use yii\helpers\Html;

$this->title = 'Ups, error(';
?>
<div class="site-error">

    <h1><?= $this->title ?></h1>

    <div class="alert alert-danger">
        <p>
            <b><?= nl2br(Html::encode($message)) ?></b>
        </p>
        <p>
            Something go wrong. But don’t worry, just go back to <a href="/"
              style="color: inherit; text-decoration: underline">main page</a>.
        </p>
        <p>
            But if this is something important, please write to me in the mail<a href="mailto:a-potap@mail.ru"
                                                                           style="font-weight: bold; color: inherit; text-decoration: underline">a-potap@mail.ru</a>
        </p>
    </div>
</div>
