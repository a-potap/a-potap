<?php

$this->title = 'Мои фотоальбомы';
?>
<h1><?=$this->title?></h1>


<? foreach ($albums as $album):?>
    <div class="row">
        <div class="col-sm-8 col-sm-offset-2">
            <a href="<?=\yii\helpers\Url::to('photo/'.$album['album'])?>"
               class="album_face"
               style="background-image: url('<?='/albums/foto/'.$album['album'].'/fase.JPG'?>')"
            >
                <h3>
                    <?=$album['name']?>
                </h3>
            </a>
         </div>
    </div>

<? endforeach;?>
