<?php
$this->title = 'Мои фотоальбомы - ' . $album->name;

$this->registerMetaTag([
    'name' => 'description',
    'content' => 'Блог Потапова Алексея. ' . $this->title,
], 'description');
$this->registerMetaTag([
    'name' => 'keywords',
    'content' => 'фотоальбомы, блог, ' . $this->title,
], 'keywords');


$this->registerJsFile(
    '@web/lightbox/js/lightbox.js',
    [
        'position' => \yii\web\View::POS_END,
        'depends' => [\yii\web\JqueryAsset::className()]
    ]
);

$this->registerCssFile("@web/lightbox/css/lightbox.css", [
    'depends' => [\yii\bootstrap\BootstrapAsset::className()],
]);

?>
<h1><?= $album->name ?></h1>

<div class="row">
    <? foreach ($album->files as $file): ?>
        <div class="col-sm-3">
            <a href="<?= $file['path'] ?>" data-lightbox="image-1" data-title="<?= $album->name ?>">
                <img src="<?=$file['path']?>" class="img-responsive photo">
            </a>
        </div>
    <?endforeach;?>
</div>
