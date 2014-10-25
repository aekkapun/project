<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "notes".
 *
 * @property integer $id
 * @property string $name
 * @property string $text
 * @property string $date
 * @property integer $project_id
 */
class Notes extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'notes';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['name', 'text', 'date', 'project_id'], 'required'],
            [['text'], 'string'],
            [['date'], 'safe'],
            [['project_id'], 'integer'],
            [['name'], 'string', 'max' => 255]
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => Yii::t('models\projects', 'ID'),
            'name' => Yii::t('models\projects', 'Name'),
            'text' => Yii::t('models\projects', 'Text'),
            'date' => Yii::t('models\projects', 'Date'),
            'project_id' => Yii::t('models\projects', 'Project ID'),
        ];
    }
}
