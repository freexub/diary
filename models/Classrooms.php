<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "classrooms".
 *
 * @property int $id
 * @property string $name
 * @property int $year_study
 * @property string $date_create
 */
class Classrooms extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'classrooms';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['name', 'year_study'], 'required'],
            [['year_study'], 'integer'],
            [['date_create'], 'safe'],
            [['name'], 'string', 'max' => 50],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'name' => 'Name',
            'year_study' => 'Year Study',
            'date_create' => 'Date Create',
        ];
    }
}
