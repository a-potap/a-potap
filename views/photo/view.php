<?php
$this->title = 'Мои фотоальбомы - '.$album_info['name'];

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
<h1><?=$album_info['name']?></h1>

<div class="row">
    <?foreach ($content as $file): ?>
        <div class="col-sm-3">
            <a href="<?=$file['path']?>" data-lightbox="image-1" data-title="<?=$album_info['name']?>">
                <img src="<?=$file['path']?>" class="img-responsive photo">
            </a>
        </div>
    <?endforeach;?>
</div>
