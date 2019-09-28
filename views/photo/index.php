<?php

$this->title = 'My photos';

$this->registerMetaTag([
    'name' => 'description',
    'content' => 'Potapov Alexey\'s blog. My travel photo albums.',
], 'description');
$this->registerMetaTag([
    'name' => 'keywords',
    'content' => 'photo albums, Cyprus 2014, Paphos, Limassol, Ayia Napa, Larnaca, Kikos, Warsaw, Paris, Berlin, Amsterdam, Ural',
], 'keywords');

?>
<h1><?=$this->title?></h1>

<?php foreach ($albums as $album) :?>
    <div class="row">
        <div class="col-sm-8 col-sm-offset-2">
            <a href="<?= \yii\helpers\Url::to('photo/' . $album->folder) ?>"
               class="album_face"
               style="background-image: linear-gradient(rgba(0, 0, 0, 0.4), rgba(0, 0, 0, 0.0)), url('<?= $album->face ?>')"
            >
                <h3>
                    <?= $album->name_en ?>
                </h3>
            </a>
         </div>
    </div>
<?php endforeach;?>
