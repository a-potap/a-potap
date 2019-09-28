<?php
$this->title = \Yii::t('app', 'My music');

$this->registerMetaTag([
    'name' => 'description',
    'content' => \Yii::t('app', 'Potapov Alexey\'s blog. My music.'),
], 'description');
$this->registerMetaTag([
    'name' => 'keywords',
    'content' => \Yii::t('app', 'Potapov Alexey\'s blog, music'),
], 'keywords');

?>

<div id="content-free">
    <h1>
        <?= $this->title; ?>
    </h1>


    <label>africanskye gluky</label><br>
    <audio controls="controls" title="africanskye gluky">
        <source src="http://a-potap.ru/albums/mus/mytracs/africanskye gluky.mp3" />
    </audio>

    <br><br>
    <label>capability</label><br>
    <audio  controls="controls">
        <source src="http://a-potap.ru/albums/mus/mytracs/capability.mp3" />
    </audio>

    <br><br>

    <label>cosmic trash</label><br>
    <audio controls="controls">
        <source src="http://a-potap.ru/albums/mus/mytracs/cosmic trash.mp3" />
    </audio>

    <br><br>

    <label>easy rock</label><br>
    <audio controls="controls">
        <source src="http://a-potap.ru/albums/mus/mytracs/easy rock.mp3" />
    </audio>

    <br><br>

    <label>fgh</label><br>
    <audio controls="controls">
        <source src="http://a-potap.ru/albums/mus/mytracs/fgh.mp3" />
    </audio>

    <br><br>

    <label>grey day</label><br>
    <audio controls="controls">
        <source src="http://a-potap.ru/albums/mus/mytracs/grey day.mp3" />
    </audio>

    <br><br>

    <label>happy ufo</label><br>
    <audio controls="controls">
        <source src="http://a-potap.ru/albums/mus/mytracs/happy_ufo.mp3" />
    </audio>

    <br><br>

    <label>i need you</label><br>
    <audio controls="controls">
        <source src="http://a-potap.ru/albums/mus/mytracs/i need you.mp3" />
    </audio>

    <br><br>

    <label>i whont be with you</label><br>
    <audio controls="controls">
        <source src="http://a-potap.ru/albums/mus/mytracs/i whont be with you.mp3" />
    </audio>

    <br><br>
    <label>listen to me</label><br>
    <audio  controls="controls">
        <source src="http://a-potap.ru/albums/mus/mytracs/listen_to_me,_looking_at_me.mp3" />
    </audio>

    <br><br>
    <label>you_v got my hart</label><br>
    <audio controls="controls">
        <source src="http://a-potap.ru/albums/mus/mytracs/you_v got my hart.mp3" />
    </audio>

</div>