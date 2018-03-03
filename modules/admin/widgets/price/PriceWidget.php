<?php

namespace app\modules\admin\widgets\price;

use app\models\Config;
use yii\widgets\InputWidget;

/**
 * Class PriceWidget
 * @package app\modules\admin\widgets\price
 *
 * @property \app\factories\AbstractPrice[] $prices
 */
class PriceWidget extends InputWidget
{
    /**
     * @return string|void
     */
    public function run()
    {
        echo $this->render('input', ['widget' => $this]);
    }

    /**
     * @return \app\factories\AbstractPrice[]
     */
    public function getPrices()
    {
        /** @var Config $model */
        $model = $this->model;
        return $model->prices;
    }
}