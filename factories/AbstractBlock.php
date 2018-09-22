<?php

namespace app\factories;

use yii\base\Model;
use yii\web\UploadedFile;

abstract class AbstractBlock extends Model
{
    /**
     * @var string
     */
    public $title;
    /**
     * @var  string
     */
    public $announcement;
    /**
     * @var  string
     */
    public $description;

    /**
     * @var  string|UploadedFile
     */
    public $image;

    public $removeImage = false;

    public function rules()
    {
        return [
            [['title', 'announcement','description'], 'string'],
            ['image', 'file', 'skipOnEmpty' => true, 'extensions' => 'jpg,png'],
            [$this->attributes(), 'required'],
            ['removeImage', 'safe']
        ];
    }

    public function upload()
    {
        if ($this->validate() && $this->image) {
            $this->image->saveAs('uploads/' . $this->image->baseName . '.' . $this->image->extension);
            return true;
        } else {
            return false;
        }
    }
}