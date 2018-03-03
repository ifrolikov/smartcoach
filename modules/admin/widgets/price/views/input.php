<?php
/**
 * @var \app\modules\admin\widgets\price\PriceWidget $widget
 */

\app\modules\admin\widgets\price\assets\PriceWidgetAsset::register($this);

$prices = $widget->getPrices();

?>
<div class="_prices"><?php
    foreach ($prices as $key => $price) {
        ?>
        <div class="price _price-item"><?php
        ?><a href="#" class="_close pull-right"><i class="glyphicon glyphicon-remove"></i></a><?php
        echo \yii\bootstrap\Html::input('text', 'Config[prices][' . $key . '][name]', $price->name, [
            'class' => "form-control price-name",
            "placeholder" => "Название цены"
        ]);
        echo \yii\bootstrap\Html::textarea('Config[prices][' . $key . '][description]', $price->description, [
            'class' => "form-control price-description",
            "placeholder" => "Описание цены"
        ]);
        echo \yii\bootstrap\Html::input('price', 'Config[prices][' . $key . '][price]', $price->price, [
            'class' => "form-control price-value",
            "placeholder" => "Цена в рублях"
        ]);
        ?></div><?php
    }

    ?>
</div>
<div class="_price-template hidden">
    <div class="price _price-item">
        <a href="#" class="_close pull-right"><i class="glyphicon glyphicon-remove"></i></a>
        <?php
        echo \yii\bootstrap\Html::input('text', '', null, [
            'class' => "form-control price-name",
            "placeholder" => "Название цены"
        ]);
        echo \yii\bootstrap\Html::textarea('', null, [
            'class' => "form-control price-description",
            "placeholder" => "Описание цены"
        ]);
        echo \yii\bootstrap\Html::input('price', '', null, [
            'class' => "form-control price-value",
            "placeholder" => "Цена в рублях"
        ]);
        ?>
    </div>
</div>
<a href="#" class="btn btn-danger _price-add"><i class="glyphicon glyphicon-plus"></i>добавить</a>