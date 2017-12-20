<?php
use yii\bootstrap\Html;

$this->title = 'Мои фотоальбомы';
?>
<h1><?=$this->title?></h1>

<div class="row">
    <?foreach ($content as $file): ?>
        <div class="col-sm-3">
            <?=Html::img($file['path'], ['class' => 'img-responsive photo' ])?>
        </div>
    <?endforeach;?>
</div>
