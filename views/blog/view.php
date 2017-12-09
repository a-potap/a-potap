<?php

use yii\helpers\Html;

$this->title = $model->title;

?>
<div class="blog-view">

    <h1><?= Html::encode($this->title) ?></h1>

    <div>
        <?= $model->date;?>
    </div>

    <?= $model->text;?>

    <div class="comments">
        <?= \yii\widgets\ListView::widget([
            'dataProvider' => new \yii\data\ActiveDataProvider([
                'query' => \app\models\BlogComents::find()->where(['idpost' => $model->id]),
            ]),
            'itemView' => '_comment',
            'emptyText' => 'Ещё нет коментариев'
        ]);?>
    </div>

</div>
