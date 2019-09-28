<?php

$this->title =  \Yii::t('app', 'Blog');

$this->registerMetaTag([
    'name' => 'description',
    'content' => \Yii::t('app', 'Potapov Alexey\'s blog. Stories about traveling across Europe to Cyprus and the Urals and not only.'),
], 'description');
$this->registerMetaTag([
    'name' => 'keywords',
    'content' => \Yii::t('app', 'travel, Ural, Cyprus, Italy, Rimini, vacation, mountains'),
], 'keywords');

?>
<div class="blog-index">
    <h1>
        <?= $this->title; ?>
    </h1>

    <?= \yii\widgets\ListView::widget([
        'dataProvider' => $dataProvider,
        'itemView' => '_post',
        'viewParams' => [
            'fullView' => false,
        ],
        'layout' => "{items} {pager}",
    ]);?>

</div>
