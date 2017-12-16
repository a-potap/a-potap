<?php

$this->title = 'Блог';
?>
<div class="blog-index">

    <?= \yii\widgets\ListView::widget([
        'dataProvider' => $dataProvider,
        'itemView' => '_post',
        'viewParams' => [
            'fullView' => false,
        ],
        'layout' =>  "{items} {pager}",
    ]);?>

</div>
