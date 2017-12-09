<?php

use yii\helpers\Html;
use yii\grid\GridView;

$this->title = 'Blogs';
$this->params['breadcrumbs'][] = $this->title;
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
