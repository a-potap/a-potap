<?php

$this->title = 'Блог';


$this->registerMetaTag([
    'name' => 'description',
    'content' => 'Блог Потапова Алексея. Рассказы о путешествиях по европе Кипру и Уралу и не только.',
], 'description');
$this->registerMetaTag([
    'name' => 'keywords',
    'content' => 'путешествиях, Урал, Кипр, Италия, Римини, отпуск, горы',
], 'keywords');

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
