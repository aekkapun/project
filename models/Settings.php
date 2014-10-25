<?php

namespace app\models;

use Yii;


class Settings extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'settings';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['default-title', 'default-description', 'default-keywords'], 'required'],
            [['default-description'], 'string'],
            [['default-keywords'], 'integer'],
            [['default-title'], 'string', 'max' => 255]
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'default-title' => 'Default Title',
            'default-description' => 'Default Description',
            'default-keywords' => 'Default Keywords',
        ];
    }
}
