<?php
declare(strict_types=1);

namespace app\models\social;

final class Base
{
    private $instagram;

    public function __construct(Instagram $instagram = null)
    {
        $this->instagram = $instagram;
    }

    public function getInstagram(): ?Instagram
    {
        return $this->instagram;
    }
}