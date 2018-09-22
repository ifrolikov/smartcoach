<?php

return [
    \app\interfaces\ConfigModelInterface::class => \app\models\Config::class,
    \app\factories\AbstractConfig::class => \app\models\Config::class,
    \app\factories\AbstractPrice::class => \app\models\Price::class,
    \app\factories\AbstractBlock::class => \app\models\Block::class
];