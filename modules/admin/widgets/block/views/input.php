<?php
/**
 * @var \app\modules\admin\widgets\block\BlockWidget $widget
 */

$blocks = $widget->getBlocks();

?>
<div>
    <h2>Блок слева</h2>
    <?php
    echo \yii\bootstrap\Html::input('text', 'Config[blocks][0][title]', $blocks[0]->title, [
        'class' => "form-control",
        "placeholder" => "Заголовок"
    ]);
    echo \yii\bootstrap\Html::textarea('Config[blocks][0][announcement]', $blocks[0]->announcement, [
        'class' => "form-control",
        "placeholder" => "Описание внутри блока"
    ]);
    echo \yii\bootstrap\Html::textarea('Config[blocks][0][description]', $blocks[0]->description, [
        'class' => "form-control",
        "placeholder" => "Описание внутри попапа"
    ]);
    echo \yii\helpers\Html::fileInput('Config[blocks][0][image]', $blocks[0]->image, [
        'class' => "form-control",
        "placeholder" => "Картинка"
    ]);
    if ($blocks[0]->image) {
        ?><img src="<?=$blocks[0]->image?>" style="max-height: 150px;" /><?php
        echo \yii\bootstrap\Html::checkbox('Config[blocks][0][removeImage]', false, [
            'label' => 'Удалить изображение'
        ]);
    }
    ?>
</div>
<div>
    <h2>Блок справа</h2>
    <?php
    echo \yii\bootstrap\Html::input('text', 'Config[blocks][1][title]', $blocks[1]->title, [
        'class' => "form-control",
        "placeholder" => "Заголовок"
    ]);
    echo \yii\bootstrap\Html::textarea('Config[blocks][1][announcement]', $blocks[1]->announcement, [
        'class' => "form-control",
        "placeholder" => "Описание внутри блока"
    ]);
    echo \yii\bootstrap\Html::textarea('Config[blocks][1][description]', $blocks[1]->description, [
        'class' => "form-control",
        "placeholder" => "Описание внутри попапа"
    ]);
    echo \yii\helpers\Html::fileInput('Config[blocks][1][image]', $blocks[1]->image, [
        'class' => "form-control",
        "placeholder" => "Картинка"
    ]);
    if ($blocks[1]->image) {
        ?><img src="<?=$blocks[1]->image?>" style="max-height: 150px;"/><?php
        echo \yii\bootstrap\Html::checkbox('Config[blocks][1][removeImage]', false, [
            'label' => 'Удалить изображение'
        ]);
    }
    ?>
</div>