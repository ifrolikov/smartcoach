<?php

use app\modules\admin\widgets\price\PriceWidget;
use app\modules\admin\widgets\block\BlockWidget;
use dosamigos\ckeditor\CKEditor;
use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\Config */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="blog-form">

    <?php $form = ActiveForm::begin(['options' => ['enctype' => 'multipart/form-data']]); ?>
    <?= $form->field($model, 'project')->textInput(['maxlength' => true])->label('Проект') ?>
    <?= $form->field($model, 'description')->widget(CKEditor::class)->label('Обо мне') ?>
    <?= $form->field($model, 'howWork')->widget(CKEditor::class)->label('Как я работаю') ?>
    <?= $form->field($model, 'phone')->textInput(['maxlength' => true])->label('Телефон') ?>
    <?= $form->field($model, 'address')->textInput(['maxlength' => true])->label('Адрес') ?>
    <?=
        $form->field($model, 'prices')->widget(PriceWidget::class)->label('Цены');
    ?>

    <?=
    $form->field($model, 'blocks')->widget(BlockWidget::class)->label('Блоки');
    ?>

    <div class="form-group">
        <?= Html::submitButton('Сохранить', ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
