<?php

return [
    \app\interfaces\ConfigModelInterface::class => \app\models\Config::class,
    \app\factories\AbstractConfig::class => \app\models\Config::class,
    \app\factories\AbstractPrice::class => \app\models\Price::class,
    \app\factories\AbstractBlock::class => \app\models\Block::class,
    \ifrolikov\dto\Interfaces\DtoBuilderInterface::class => function (yii\di\Container $container) {
        return $container->get(\ifrolikov\dto\Facade::class)->getDtoBuilder();
    },
    \ifrolikov\dto\JsonDtoPacker::class => function (yii\di\Container $container) {
        return $container->get(\ifrolikov\dto\Facade::class)->getJsonDtoPacker();
    },
    \ifrolikov\dto\Facade::class => \ifrolikov\dto\Facade::class,
    \app\repository\SocialNetworks::class => function (yii\di\Container $container) {
        return new \app\repository\SocialNetworks(
            $container->get(\ifrolikov\dto\JsonDtoPacker::class),
            $container->get(\ifrolikov\dto\Interfaces\DtoBuilderInterface::class)
        );
    }
];