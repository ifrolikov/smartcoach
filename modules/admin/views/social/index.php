<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $config \app\models\social\Base */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="blog-form">

    <?php $form = ActiveForm::begin(); ?>
    <h2>Instagram</h2>
    <?= $form->field($config, 'instagram[appId]')->textInput(['maxlength' => true])->label('Client ID') ?>
    <?= $form->field($config, 'instagram[user]')->textInput(['maxlength' => true])->label('User') ?>
    <?= $form->field($config, 'instagram[password]')->passwordInput(['maxlength' => true])->label('Password') ?>

    <div class="form-group">
        <?= Html::submitButton('Сохранить', ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
