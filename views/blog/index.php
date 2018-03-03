<?php

use yii\data\ActiveDataProvider;

/**
 * @var ActiveDataProvider $dataProvider
 */

$dataProvider->prepare(true);

\app\assets\MainPageAsset::register($this);

?>
    <div class="like-a-blog">
    <div class="bg"></div>
    <div class="container">
        <h2>Блог</h2>
        <?php
        /** @var \app\models\Blog $model */
        foreach ($dataProvider->models as $model) {
            ?>
            <div class="media">
                <div class="media-body">
                    <h4 class="media-heading"><?= $model->title ?></h4>
                    <?= $model->description ?>
                </div>
            </div>
            <?php
        }
        echo \yii\widgets\LinkPager::widget(['pagination' => $dataProvider->getPagination()]);
        ?></div></div><?php