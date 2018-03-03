<?php

namespace app\modules\admin\widgets\price\assets;

use yii\web\AssetBundle;
use yii\web\JqueryAsset;

/**
 * Class PriceWidgetAsset
 * @package app\modules\admin\widgets\price\assets
 */
class PriceWidgetAsset extends AssetBundle
{
    public $sourcePath = __DIR__;
    public $depends = [
        JqueryAsset::class
    ];

    public $css = [
        "css/price-admin.css"
    ];

    public $js = [
        "js/price.js"
    ];
}