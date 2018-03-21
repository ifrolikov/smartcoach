<?php

namespace app\builders;

use app\factories\AbstractBlock;
use app\factories\AbstractConfig;
use app\factories\AbstractPrice;
use app\interfaces\ConfigModelInterface;
use yii\base\Model;
use yii\di\Instance;
use yii\helpers\Html;
use yii\helpers\HtmlPurifier;
use yii\web\UploadedFile;

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
     * @var AbstractBlock
     */
    private $blockModel;

    /**
     * ConfigBuilder constructor.
     * @param ConfigModelInterface $model
     * @param AbstractPrice $priceModel
     * @param AbstractBlock $blockModel
     */
    public function __construct(ConfigModelInterface $model, AbstractPrice $priceModel, AbstractBlock $blockModel)
    {
        $this->model = $model;
        $this->priceModel = $priceModel;
        $this->blockModel = $blockModel;
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
        $this->prepareBlock($data);
        if ($this->data) {
            $blocksData = $data['blocks'] ?? [];
            $blocks = $this->data['blocks'] ? (
            is_string($this->data['blocks']) ?
                json_decode($this->data['blocks'], true) : (array)$this->data['blocks']
            ) : [];
            if (!$blocksData) {
                $blocksData = $blocks;
            } else {
                foreach ($blocks as $key => $block) {
                    if (isset($blocksData[$key])) {
                        $blocksData[$key]->setAttributes($block);
                    }
                }
            }
            $blocksData = array_map(function (AbstractBlock $block) {
                return $block->toArray();
            }, $blocksData);
            $data = array_merge($data, $this->data);
            $data['blocks'] = $blocksData;
            $this->beforeBlockSave($data);
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
        $data['prices'] = is_string($data['prices']) ? json_decode($data['prices'], true) : $data['prices'];
        $prices = [];
        foreach ($data['prices'] as $price) {
            $priceModel = clone $this->priceModel;
            $priceModel->setAttributes($price);
            $prices[] = $priceModel;
        }
        $data['prices'] = $prices;
    }

    /**
     * @param array $data
     */
    private function beforeBlockSave(array &$data)
    {
        $data['blocks'] = is_string($data['blocks']) ? json_decode($data['blocks'], true) : $data['blocks'];
        $blocks = [];
        foreach ($data['blocks'] as $key => $block) {
            /** @var AbstractBlock $blockModel */
            $blockModel = clone $this->blockModel;
            $oldImage = $block['image'] ?? null;
            $blockModel->setAttributes($block);
            $blockModel->image = UploadedFile::getInstanceByName("Config[blocks][{$key}][image]");
            if ($blockModel->upload()) {
                $blockModel->image = '/uploads/' . $blockModel->image->name;
            } else {
                $blockModel->image = $oldImage;
            }
            if (isset($block['removeImage']) && $block['removeImage']) {
                $blockModel->image = null;
            }
            $blocks[] = $blockModel;
        }
        $data['blocks'] = $blocks;
    }

    /**
     * @param array $data
     */
    private function prepareBlock(array &$data)
    {
        if (!isset($data['blocks'])) {
            $data['blocks'] = [
                $this->blockModel::instance(true),
                $this->blockModel::instance(true)
            ];
            return;
        }
        $data['blocks'] = is_string($data['blocks']) ? json_decode($data['blocks'], true) : $data['blocks'];
        $blocks = [];
        foreach ($data['blocks'] as $key => $block) {
            $blockModel = clone $this->blockModel;
            $blockModel->setAttributes($block);
            $blocks[] = $blockModel;
        }
        $data['blocks'] = $blocks;
    }
}