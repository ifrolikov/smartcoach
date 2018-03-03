<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\Review */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="review-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'created_at')->widget(\kartik\date\DatePicker::class) ?>

    <?= $form->field($model, 'title')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'description')->widget(\dosamigos\ckeditor\CKEditor::class,
        [
            'preset' => 'basic',
            'clientOptions' => [
                'filebrowserUploadUrl' => '/admin/upload'
            ]
        ])->label('Описание') ?>

    <?= $form->field($model, 'image')->fileInput(['maxlength' => true]) ?>
    <?php echo Html::img($model->image,['style' => ['max-height' => '100px']]); ?>

    <?= $form->field($model, 'is_active')->checkbox() ?>

    <div class="form-group">
        <?= Html::submitButton('Сохранить', ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
