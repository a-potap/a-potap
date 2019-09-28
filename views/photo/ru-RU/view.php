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
        'depends' => [\yii\web\JqueryAsset::class]
    ]
);

$this->registerCssFile("@web/lightbox/css/lightbox.css", [
    'depends' => [\yii\bootstrap\BootstrapAsset::class],
]);

?>
<h1><?= $album->name ?></h1>

<div class="row">
    <div class="col-xs-12">
        <p>
            <?= $album->date_create?>
        </p>

        <p>
            <?= $album->description?>
        </p>
    </div>
    <?php foreach ($album->files as $file): ?>
        <div class="col-sm-3">
            <a href="<?= $file['path'] ?>" data-lightbox="image-1" data-title="<?= $album->name ?>">
                <img src="<?=$file['path']?>" class="img-responsive photo">
            </a>
        </div>
    <?php endforeach;?>
</div>
