<?php

use yii\helpers\Html;

?>

<div class="post">
    <h2><?= Html::a(Html::encode($model->title_en), ['/post/'.$model->id])?></h2>
    <div><?= $model->date ?></div>

    <?= mb_substr($model->text_en, 0, 250).'...' ?>
</div>
