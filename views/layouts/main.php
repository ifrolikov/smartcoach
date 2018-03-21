<?php

/* @var $this \yii\web\View */
/* @var $content string */

use app\facades\ConfigFacade;
use yii\helpers\Html;
use yii\bootstrap\Nav;
use yii\bootstrap\NavBar;
use yii\widgets\Breadcrumbs;
use app\assets\AppAsset;

AppAsset::register($this);
?>
<?php $this->beginPage() ?>
<!DOCTYPE html>
<head>
    <meta charset="<?= Yii::$app->charset ?>">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <?= Html::csrfMetaTags() ?>
    <title><?= Html::encode($this->title) ?></title>
    <?php $this->head() ?>
</head>
<body>
<?php $this->beginBody() ?>

<div class="wrap">
    <?php
    NavBar::begin([
        'brandLabel' => ConfigFacade::getProjectName(),
        'brandUrl' => "/#",
        'options' => [
            'class' => 'navbar-inverse navbar-fixed-top',
        ],
    ]);

    $items = [];
    if (ConfigFacade::getPrices()) {
        $items[] = ['label' => 'Цены', 'url' => ['/#tseny']];
    }
    $items = array_merge($items, [
        ['label' => 'Контакты', 'url' => ['/#kontakty']],
        ['label' => 'Блог', 'url' => ['/blog']],
        ['label' => 'Отзывы', 'url' => ['/otzyvy']]
    ]);
    echo Nav::widget([
        'options' => ['class' => 'navbar-nav navbar-right'],
        'items' => $items
    ]);
    NavBar::end();
    ?>
    <?= $content ?>
</div>

<footer class="footer">
    <div class="container">
        <p class="pull-left">&copy; <?= ConfigFacade::getProjectName()?> <?= date('Y') ?></p>
    </div>
</footer>

<?php $this->endBody() ?>
</body>
</html>
<?php $this->endPage() ?>
