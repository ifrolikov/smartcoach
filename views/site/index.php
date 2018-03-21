<?php

/* @var $this yii\web\View */

use app\facades\ConfigFacade;

$this->title = ConfigFacade::getProjectName();
$blocks = ConfigFacade::getBlocks();
\app\assets\MainPageAsset::register($this);
\app\assets\SmartcoachAsset::register($this);
?>
<style>
    <?php if ($blocks[0]['image']) { ?>
    body > .wrap > div.body > div:nth-child(1) {
        background-image: url('<?= $blocks[0]['image'] ?>') !important;
    }
    <?php } ?>
    <?php if ($blocks[1]['image']) { ?>
    body > .wrap > div.body > div:nth-child(2) {
        background-image: url('<?= $blocks[1]['image'] ?>') !important;
    }
    <?php } ?>
</style>


<div class="popup" id="popup1">
    <a class="close animate-fast" href="#">&times;</a>
    <img src="<?= $blocks[0]->image ?>" />
    <div class="content">
        <div class="title"><?= $blocks[0]->title ?></div>
        <div class="description"><?= $blocks[0]->description ?></div>
        <a href="https://www.instagram.com/smartcoach77/" target="_blank" rel="nofollow">Больше информации в Instagram</a>
        <br />
        <a class="btn btn-danger" href="tel:<?=ConfigFacade::getPhone()?>">Позвонить</a>
    </div>
</div>
<div class="popup" id="popup2">
    <a class="close animate-fast" href="#">&times;</a>
    <img src="<?= $blocks[1]->image ?>" />
    <div class="content">
        <div class="title"><?= $blocks[0]->title ?></div>
        <div class="description"><?= $blocks[0]->description ?></div>
        <a href="https://www.instagram.com/smartcoach77/" target="_blank" rel="nofollow">Больше информации в Instagram</a>
        <br />
        <a class="btn btn-danger" href="tel:<?=ConfigFacade::getPhone()?>">Позвонить</a>
    </div>
</div>
<!--<div class="jumbotron main-picture body">-->
<!--    <div class="container">-->
<!--        <h1>--><?//= ConfigFacade::getHeader() ?><!--</h1>-->
<!--        --><?//= ConfigFacade::getAnnouncement() ?>
<!--        <p><a href="tel:--><?//= ConfigFacade::getPhone() ?><!--" class="btn btn-danger"><i-->
<!--                        class="glyphicon glyphicon-phone"></i> Позвонить</a></p>-->
<!--    </div>-->
<!--</div>-->
<div class="body">
    <div class="part animate">
        <div class="content animate-fast">
            <div class="title animate-fast"><?= $blocks[0]->title ?></div>
            <div class="description animate-fast"><?= $blocks[0]->announcement ?></div>
            <a href="#" class="animate-fast _popup-link btn btn-danger" data-popup="popup1">Подробнее</a>
        </div>
    </div>
    <div class="part animate">
        <div class="content animate-fast">
            <div class="title animate-fast"><?= $blocks[1]->title ?></div>
            <div class="description animate-fast"><?= $blocks[1]->announcement ?></div>
            <a href="#" class="animate-fast _popup-link btn btn-danger" data-popup="popup2">Подробнее</a>
        </div></div>
    <div class="clear"></div>
</div>
<div class="body-blocks">
    <div class="body-block">
        <div class="container">
            <h2>Обо мне</h2>
            <?= ConfigFacade::getDescription() ?>
        </div>
    </div>
    <?php if ($data = ConfigFacade::getHowWork()) { ?>
    <div class="body-block">
        <div class="container">
            <h2>Как я работаю</h2>
            <?= $data ?>
        </div>
    </div>
    <?php } ?>
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
