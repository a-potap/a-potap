<?php
use yii\bootstrap\Modal;

?>

<div class="comments-form">
    <?php
    Modal::begin([
        'header' => '<h4>Что думаешь об этом?</h4>',
        'closeButton' => false,
        'options' => ['id' => 'comment_model'],
        'bodyOptions' => [
            'id' => 'comment_model_content',
            'class' => 'modal-body',
            'data-url' => \yii\helpers\Url::to('comment/'.$model->id)
        ],
        'toggleButton' => ['label' => 'Оставить коментарий', 'class' => 'btn btn-primary'],
    ]);
    ?>
    Загрузка ...
    <?php Modal::end(); ?>
</div>

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
<div class="social_vk">
    <script type="text/javascript">
        <!--
        document.write(VK.Share.button(false, {type: "round", text: "Потделиться"}));
        -->
    </script>
</div>
