<?php

/* @var $this yii\web\View */

use app\facades\ConfigFacade;

$this->title = ConfigFacade::getProjectName();
\app\assets\MainPageAsset::register($this);
?>

<div class="jumbotron main-picture">
    <div class="container">
        <h1><?= ConfigFacade::getHeader() ?></h1>
        <?= ConfigFacade::getAnnouncement() ?>
        <p><a href="tel:<?= ConfigFacade::getPhone() ?>" class="btn btn-danger"><i
                        class="glyphicon glyphicon-phone"></i> Позвонить</a></p>
    </div>
</div>
<div class="body-blocks">
    <div class="body-block">
        <div class="container">
            <h2>Обо мне</h2>
            <?= ConfigFacade::getDescription() ?>
        </div>
    </div>
    <?php if ($prices = ConfigFacade::getPrices()) { ?>
    <div class="body-block body-block-price">
        <div class="container">
            <a name="tseny"></a>
            <h2>Цены</h2>
            <div class="center-block" style="text-align: center;">
                <?php foreach ($prices as $price) { ?>
                    <div class="center-block text-center price-item">
                        <div class="panel panel-pricing animate">
                            <div class="panel-heading">
                                <i class="fa fa-desktop"></i>
                                <h3><?= $price->name ?></h3>
                            </div>
                            <div class="panel-body panel-price text-center">
                                <p><span class="price"><?= $price->price ?></span><i
                                            class="glyphicon glyphicon-rub"></i></p>
                            </div>
                            <div class="panel-body text-center panel-description">
                                <?= nl2br($price->description) ?>
                            </div>
                            <div class="panel-footer">
                                <a href="tel:<?= ConfigFacade::getPhone() ?>"
                                   class="btn btn-lg btn-block btn-danger"><i
                                            class="glyphicon glyphicon-phone"></i> Позвонить</a>
                            </div>
                        </div>
                    </div>
                <?php } ?>
                <div class="clearfix"></div>
            </div>
        </div>
    </div>
    <?php } ?>
    <div class="body-block">
        <a name="kontakty"></a>
        <div class="container">
            <h2>Контакты</h2>
            <p><b>Адрес:</b> <span><?= ConfigFacade::getAddress() ?></span></p>
            <p><b>Телефон:</b> <span><?= ConfigFacade::getPhone() ?></span> <a
                        href="tel:<?= ConfigFacade::getPhone() ?>"><i
                            class="glyphicon glyphicon-phone"></i></a></p>
        </div>
        <br/>
        <script type="text/javascript" charset="utf-8" async
                src="https://api-maps.yandex.ru/services/constructor/1.0/js/?um=constructor%3A380f8bf9bfa4c5113446ac0853d7e029df9eae47341288eb252a7607d24e99aa&amp;width=100%&amp;height=600&amp;lang=ru_RU&amp;scroll=true"></script>
    </div>
</div>