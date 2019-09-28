<?php

$this->title = 'Мои фотоальбомы';

$this->registerMetaTag([
    'name' => 'description',
    'content' => 'Блог Потапова Алексея. Мои фотоальбомы из путешествий.',
], 'description');
$this->registerMetaTag([
    'name' => 'keywords',
    'content' => 'фотоальбомы, Кипр 2014, Пафос, Лимассол, Айя-Напа, Ларнака, Кикос, Варшава, Париж, Берлин, Амстердам, Урал',
], 'keywords');

?>
<h1><?=$this->title?></h1>


<?php foreach ($albums as $album):?>
    <div class="row">
        <div class="col-sm-8 col-sm-offset-2">
            <a href="<?= \yii\helpers\Url::to('photo/' . $album->folder) ?>"
               class="album_face"
               style="background-image: linear-gradient(rgba(0, 0, 0, 0.4), rgba(0, 0, 0, 0.0)), url('<?= $album->face ?>')"
            >
                <h3>
                    <?= $album->name ?>
                </h3>
            </a>
         </div>
    </div>

<?php endforeach;?>
