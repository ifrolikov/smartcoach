<?php
declare(strict_types=1);

namespace app\models\social;

use yii\base\Model;

final class Base extends Model
{
    private $instagram;

    public function __construct(Instagram $instagram = null)
    {
        $this->instagram = $instagram;
        parent::__construct([]);
    }

    public function getInstagram(): ?Instagram
    {
        return $this->instagram;
    }
}