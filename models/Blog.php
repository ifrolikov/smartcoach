<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "blog".
 *
 * @property int $id
 * @property string $created_at
 * @property string $title
 * @property string $description
 * @property int $is_active
 */
class Blog extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'blog';
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
            'title' => 'Заголовок',
            'description' => 'Статья',
            'is_active' => 'Показывать',
        ];
    }
}
