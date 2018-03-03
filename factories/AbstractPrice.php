<?php

namespace app\factories;

use yii\base\Model;

abstract class AbstractPrice extends Model
{
    /**
     * @var int
     */
    public $price;
    /**
     * @var string
     */
    public $name;
    /**
     * @var  string
     */
    public $description;

    public function rules()
    {
        return [
            ['price', 'integer'],
            [['name', 'description'], 'string'],
            [$this->attributes(), 'required']
        ];
    }
}