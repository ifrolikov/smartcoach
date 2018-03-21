<?php

namespace app\factories;

use yii\base\Model;
use yii\base\NotSupportedException;

abstract class AbstractConfig extends Model
{
    /**
     * @var string
     */
    public $project;
    /**
     * @var string
     */
    public $header;
    /**
     * @var string
     */
    public $announcement;
    /**
     * @var string
     */
    public $phone;
    /**
     * @var string
     */
    public $address;
    /**
     * @var AbstractPrice[]
     */
    public $prices;
    /**
     * @var string
     */
    public $description;

    /**
     * @var AbstractBlock[]
     */
    public $blocks;

    public function rules()
    {
        return [
            [['project', 'header', 'announcement', 'phone', 'description'], 'string'],
            [['project', 'header', 'announcement', 'address', 'prices', 'blocks'], 'required']
        ];
    }

    /**
     * @throws NotSupportedException
     */
    public function save()
    {
        throw new NotSupportedException();
    }
}