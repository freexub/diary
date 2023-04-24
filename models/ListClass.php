<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "list_class".
 *
 * @property int $id
 * @property string $name
 * @property int $year_study
 * @property string $date_create
 */
class ListClass extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'class_list';
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
            'name' => 'Название',
            'year_study' => 'Год обучения',
            'date_create' => 'Date Create',
        ];
    }

    public function getAllClassType(){
        return ClassType::find()->all();
    }
}
