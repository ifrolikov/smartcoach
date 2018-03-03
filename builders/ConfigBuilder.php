<?php

namespace app\builders;

use app\factories\AbstractConfig;
use app\factories\AbstractPrice;
use app\interfaces\ConfigModelInterface;
use yii\di\Instance;
use yii\helpers\HtmlPurifier;

class ConfigBuilder
{
    /**
     * @var ConfigModelInterface
     */
    private $model;
    /**
     * @var array
     */
    private $data;
    /**
     * @var AbstractPrice
     */
    private $priceModel;

    /**
     * ConfigBuilder constructor.
     * @param ConfigModelInterface $model
     * @param AbstractPrice $priceModel
     */
    public function __construct(ConfigModelInterface $model, AbstractPrice $priceModel)
    {
        $this->model = $model;
        $this->priceModel = $priceModel;
    }

    /**
     * @return AbstractConfig
     */
    public function build(): AbstractConfig
    {
        if (!$this->model instanceof AbstractConfig) {
            $model = Instance::of(AbstractConfig::class);
        } else {
            $model = $this->model;
        }
        $data = $this->model->loadFromSource();
        $this->preparePrice($data);
        if ($this->data) {
            $data = array_merge($data, $this->data);
        }
        $model->setAttributes($data);

        return $model;
    }

    /**
     * @return array
     */
    public function getData(): array
    {
        return $this->data;
    }

    /**
     * @param array $data
     * @return ConfigBuilder
     */
    public function setData(array $data): ConfigBuilder
    {
        $data = array_map(function ($value) {
            if (is_array($value)) {
                $value = json_encode($value, JSON_UNESCAPED_UNICODE);
            }
            return HtmlPurifier::process($value);
        }, $data);
        $this->data = $data;
        return $this;
    }

    /**
     * @param array $data
     */
    private function preparePrice(array &$data)
    {
        if (!isset($data['prices'])) {
            return;
        }
        $data['prices'] = json_decode($data['prices'], true);
        $prices = [];
        foreach ($data['prices'] as $price) {
            $priceModel = clone $this->priceModel;
            $priceModel->setAttributes($price);
            $prices[] = $priceModel;
        }
        $data['prices'] = $prices;
    }
}