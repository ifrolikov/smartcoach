<?php

use app\modules\admin\widgets\price\PriceWidget;
use dosamigos\ckeditor\CKEditor;
use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\Config */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="blog-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'project')->textInput(['maxlength' => true])->label('Проект') ?>
    <?= $form->field($model, 'header')->textInput(['maxlength' => true])->label('Заголовок') ?>
    <?= $form->field($model, 'announcement')->widget(CKEditor::class)->label('Описание') ?>
    <?= $form->field($model, 'description')->widget(CKEditor::class)->label('Обо мне') ?>
    <?= $form->field($model, 'phone')->textInput(['maxlength' => true])->label('Телефон') ?>
    <?= $form->field($model, 'address')->textInput(['maxlength' => true])->label('Адрес') ?>
    <?=
        $form->field($model, 'prices')->widget(PriceWidget::class)->label('Цены');
    ?>

    <div class="form-group">
        <?= Html::submitButton('Сохранить', ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
