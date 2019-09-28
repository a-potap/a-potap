<div class="row comment">
    <div class="col-xs-11 col-xs-offset-1">
        <strong><?=$model->iduser?></strong>
        <span><?= \Yii::$app->formatter->asDate($model->date)?></span>
        <p>
            <?=$model->text?>
        </p>
    </div>
</div>
