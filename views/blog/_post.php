<?php
use yii\bootstrap\Html;
?>

<div class="post">
    <h2><?= Html::a(Html::encode($model->title), '/post/'.$model->id)?></h2>
    <span><?=$model->date?></span>

    <?= \yii\helpers\HtmlPurifier::process($model->text) ?>
</div>
