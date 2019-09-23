<?php

use yii\helpers\Html;

$this->title = $model->title;

$this->registerJsFile('https://vk.com/js/api/share.js?95', ['position' => \yii\web\View::POS_HEAD, 'charset' => 'windows-1251']);

$this->registerMetaTag([
    'name' => 'description',
    'content' => 'Блог Потапова Алексея. ' . $model->title,
], 'description');
$this->registerMetaTag([
    'name' => 'keywords',
    'content' => 'путешествия, блог, ' . $model->title,
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
        <?= $model->date;?>
    </div>

    <?= $model->getCompiled_text($model->text) ?>

    <?= $this->render( '_commentsBlock', ['model'=> $model] ); ?>
</div>