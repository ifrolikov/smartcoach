<?php

namespace app\models;

use yii\web\UploadedFile;

/**
 * This is the model class for table "review".
 *
 * @property int $id
 * @property string $created_at
 * @property string $title
 * @property string $description
 * @property UploadedFile $image
 * @property int $is_active
 */
class Review extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'review';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['created_at'], 'safe'],
            [['title', 'description', 'created_at'], 'required'],
            [['description'], 'string'],
            [['is_active'], 'integer'],
            [['title'], 'string', 'max' => 255],
            ['image', 'file', 'skipOnEmpty' => true, 'extensions' => 'jpg,png']
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'created_at' => 'Время создания',
            'title' => 'Автор',
            'description' => 'Отзыв',
            'image' => 'Аватар автора',
            'is_active' => 'Показывать',
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
