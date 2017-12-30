<?php

use yii\bootstrap\Modal;
use yii\helpers\Html;

$this->title = $model->title;

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

    <?= $model->text;?>

    <p>
        <?
        Modal::begin([
            'header' => '<h4>Что думаешь об этом?</h4>',
            'closeButton' => false,
            'options' => ['id' => 'comment_model'],
            'bodyOptions' => [
                'id' => 'comment_model_content',
                'class' => 'modal-body',
                'data-url' => '/post/comment/' . $model->id
            ],
            'toggleButton' => ['label' => 'Оставить коментарий', 'class' => 'btn btn-primary'],
        ]);
        ?>
        Загрузка ...
        <? Modal::end(); ?>
    </p>

    <div class="comments" id="comments">
        <p>
            <strong>Комментарии:</strong>
        </p>

        <?= \yii\widgets\ListView::widget([
            'dataProvider' => new \yii\data\ActiveDataProvider([
                'query' => \app\models\BlogComents::find()->where(['idpost' => $model->id]),
            ]),
            'itemView' => '_comment',
            'layout' =>  "{items} {pager}",
            'emptyText' => 'Ещё нет коментариев'
        ]);?>
    </div>
</div>
