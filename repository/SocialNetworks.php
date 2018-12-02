<?php
declare(strict_types=1);

namespace app\repository;

use app\models\social\Base;
use app\models\social\Instagram;
use ifrolikov\dto\Interfaces\DtoBuilderInterface;
use ifrolikov\dto\JsonDtoPacker;

class SocialNetworks
{
    const CONFIG_FILE = __DIR__ . '/../_data/social.json';

    /**
     * @var JsonDtoPacker
     */
    private $jsonPacker;

    /**
     * @var null|Base
     */
    private $source = null;
    /**
     * @var DtoBuilderInterface
     */
    private $dtoBuilder;

    public function __construct(JsonDtoPacker $jsonPacker, DtoBuilderInterface $dtoBuilder)
    {
        $this->jsonPacker = $jsonPacker;
        $this->dtoBuilder = $dtoBuilder;
        $this->initSource();
    }

    public function getInstagram(): Instagram
    {
        return $this->source->getInstagram();
    }

    /**
     * @param Base $baseConfig
     * @throws \ReflectionException
     */
    public function save(Base $baseConfig)
    {
        file_put_contents(self::CONFIG_FILE, $this->jsonPacker->pack($baseConfig));
    }

    public function getBase(): Base
    {
        return $this->source ?? new Base();
    }

    private function initSource()
    {
        if (!file_exists(self::CONFIG_FILE)) {
            return;
        }

        $source = file_get_contents(self::CONFIG_FILE);
        if (empty($source)) {
            return;
        }

        $json = json_decode($source, true);
        if (json_last_error()) {
            return;
        }

        $this->source = $this->dtoBuilder->setData($json)->build(Base::class);
    }
}