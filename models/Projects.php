<?php

namespace app\models;

use Yii;

class Projects extends \yii\db\ActiveRecord {
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'projects';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['name', 'description', 'price', 'kurs', 'days', 'status', 'valuta', 'paid'], 'required'],
            [['description', 'link_site'], 'string'],
            [['price', 'days'], 'integer'],
            [['kurs'], 'number'],
            [['date_pochatoc', 'date_kinetc'], 'safe'],
            [['name'], 'string', 'max' => 250],
            [['status'], 'string', 'max' => 50],
            [['valuta'], 'string', 'max' => 10]
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
            'description' => Yii::t('models\projects', 'Description'),
            'price' => Yii::t('models\projects', 'Price'),
            'kurs' => Yii::t('models\projects', 'Kurs'),
            'date_pochatoc' => Yii::t('models\projects', 'Date Pochatoc'),
            'date_kinetc' => Yii::t('models\projects', 'Date Kinetc'),
            'days' => Yii::t('models\projects', 'Days'),
            'status' => Yii::t('models\projects', 'Status'),
            'valuta' => Yii::t('models\projects', 'Valuta'),
            'link_site' => Yii::t('models\projects', 'Link Site'),
            'paid' => Yii::t('models\projects', 'Paid'),
        ];
    }
    public function allCurrencies() {
        return [
            'dol' => Yii::t('models\projects', 'dol'),
            'rub' => Yii::t('models\projects', 'rub'),
            'uah' => Yii::t('models\projects', 'uah'),
        ];
    }
    public function allStatus() {
        return [
            'reviewed'          => Yii::t('models\projects', 'Reviewed'),
            'developing'        => Yii::t('models\projects', 'Developing'),
            'done_but_not_paid' => Yii::t('models\projects', 'Done but not paid'),
            'done'              => Yii::t('models\projects', 'Done and paid'),
        ];
    }
}
