<?php

use yii\bootstrap\ActiveForm;
use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\Blog */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="comment-form">

    <?php $form = ActiveForm::begin([
        'id' => 'form-comment',
        'enableAjaxValidation' => false,
        'action' => ['/post/comment/' . $model->idpost]
    ]); ?>

    <?= $form->field($model, 'iduser')->textInput(['maxlength' => true, 'placeholder' => 'Имя или ник']) ?>

    <?= $form->field($model, 'text')->textarea(['rows' => 3]) ?>

    <div class="form-group text-right">
        <button type="button" class="btn btn-link btn-primary" data-dismiss="modal">Закрыть</button>
        <?= Html::submitButton('Отправить', ['class' => 'btn btn-primary']) ?>
    </div>

    <?php ActiveForm::end(); ?>
</div>