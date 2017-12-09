<?php

use yii\helpers\Html;

$this->title = 'Блог';
?>
<div class="blog-index">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= \yii\widgets\ListView::widget([
        'dataProvider' => $dataProvider,
        'itemView' => '_post',
        'viewParams' => [
            'fullView' => false,
        ],
    ]);?>

</div>
