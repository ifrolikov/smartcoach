<?php

namespace app\facades;

use app\builders\ConfigBuilder;
use app\factories\AbstractBlock;
use app\factories\AbstractPrice;
use yii\di\Instance;

final class ConfigFacade
{
    public static function getProjectName(): string
    {
        return self::getBuilder()->build()->project;
    }

    public static function getHeader(): string
    {
        return self::getBuilder()->build()->header;
    }

    public static function getAnnouncement(): string
    {
        return self::getBuilder()->build()->announcement;
    }

    public static function getPhone(): string
    {
        return self::getBuilder()->build()->phone;
    }

    public static function getAddress(): string
    {
        return self::getBuilder()->build()->address;
    }

    /**
     * @return string
     */
    public static function getHowWork()
    {
        return self::getBuilder()->build()->howWork;
    }

    /**
     * @return AbstractPrice[]
     */
    public static function getPrices(): array
    {
        return self::getBuilder()->build()->prices;
    }

    public static function getDescription(): string
    {
        return self::getBuilder()->build()->description;
    }

    /**
     * @return AbstractBlock[]
     */
    public static function getBlocks(): array
    {
        return self::getBuilder()->build()->blocks;
    }

    /**
     * @return ConfigBuilder
     */
    private static function getBuilder(): ConfigBuilder
    {
        /** @var ConfigBuilder $return */
        $return = Instance::of(ConfigBuilder::class)->get();
        return $return;
    }
}