<?php
$this->title = 'My photos - ' . $album->name_en;

$this->registerMetaTag([
    'name' => 'description',
    'content' => 'Potapov Alexey\'s blog. ' . $this->title,
], 'description');
$this->registerMetaTag([
    'name' => 'keywords',
    'content' => 'photo albums, blog, ' . $this->title,
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
<h1><?= $album->name_en ?></h1>

<div class="row">
    <div class="col-xs-12">
        <p>
            <i><?= \Yii::$app->formatter->asDate($album->date_create)?></i>
        </p>

        <p>
            <?= $album->description_en?>
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
