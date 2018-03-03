<?php

use yii\data\ActiveDataProvider;

/**
 * @var ActiveDataProvider $dataProvider
 */

$dataProvider->prepare(true);

\app\assets\MainPageAsset::register($this);

?>
    <div class="like-a-blog">
    <div class="bg reviews"></div>
    <div class="container">
        <h2>Отзывы</h2><?php
        /** @var \app\models\Review $model */
        foreach ($dataProvider->models as $model) {
            ?>
            <div class="media">
                <div class="pull-left media-object">
                    <img src="<?= $model->image ?>"/>
                </div>
                <div class="media-body">
                    <h4 class="media-heading"><?= $model->title ?></h4>
                    <?= $model->description ?>
                    <br />
                    <p><i><?= date('d.m.Y',strtotime($model->created_at)) ?></i></p>
                </div>
            </div>
            <?php
        }
        echo \yii\widgets\LinkPager::widget(['pagination' => $dataProvider->getPagination()]);
        ?></div></div><?php