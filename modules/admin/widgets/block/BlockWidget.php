<?php

namespace app\modules\admin\widgets\block;

use app\factories\AbstractBlock;
use app\models\Config;
use yii\di\Instance;
use yii\widgets\InputWidget;

/**
 * Class BlockWidget
 * @package app\modules\admin\widgets\block
 *
 * @property \app\factories\AbstractBlock[] $blocks
 */
class BlockWidget extends InputWidget
{
    /**
     * @return string|void
     */
    public function run()
    {
        echo $this->render('input', ['widget' => $this]);
    }

    /**
     * @return \app\factories\AbstractBlock[]
     */
    public function getBlocks()
    {
        /** @var Config $model */
        $model = $this->model;
        return $model->blocks ?? [
            Instance::of(AbstractBlock::class)->get()::instance(true),
            Instance::of(AbstractBlock::class)->get()::instance(true)
        ];
    }
}