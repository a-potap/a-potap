<?php

use yii\helpers\Html;

$this->title = $model->title_en;

$this->registerJsFile('https://vk.com/js/api/share.js?95', ['position' => \yii\web\View::POS_HEAD, 'charset' => 'windows-1251']);

$this->registerMetaTag([
    'name' => 'description',
    'content' => 'Potapov Alexey\'s blog. ' . $model->title_en,
], 'description');
$this->registerMetaTag([
    'name' => 'keywords',
    'content' => 'travel, blog, ' . $model->title_en,
], 'keywords');

$this->registerJs(
    "
    $('#comment_model').on('show.bs.modal', function (e) {
        $('#comment_model_content').load($('#comment_model_content').data('url'));
    });
    
    $('body').on('submit', 'form', function (e) {
        e.preventDefault();
        var form = $(this);
        var formData = form.serialize();
        $.ajax({
            url: form.attr('action'),
            type: 'POST',
            data: formData,
            success: function (data) {
                 $('#comment_model_content').html(data);
            },
            error: function () {
                alert('Извини, не получилось отправить коментарий( ');
            }
        });
    });
    ",
    \yii\web\View::POS_READY,
    'my-button-handler'
);

?>
<div class="blog-view">

    <h1><?= Html::encode($this->title) ?></h1>

    <div>
        <p>
            <i><?= \Yii::$app->formatter->asDate($model->date)?></i>
        </p>
    </div>

    <?= $model->getCompiled_text($model->text_en) ?>

    <?= $this->render( '_commentsBlock', ['model'=> $model] ); ?>

</div>
