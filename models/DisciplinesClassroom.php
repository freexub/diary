<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "disciplines_classroom".
 *
 * @property int $id
 * @property int $class_type_id
 * @property int $disciplines_id
 * @property int $active
 */
class DisciplinesClassroom extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'disciplines_class_type';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['class_type_id', 'disciplines_id'], 'required'],
            [['class_type_id', 'disciplines_id', 'active'], 'integer'],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'class_type_id' => 'Год обучения',
            'disciplines_id' => 'Дисциплина',
            'active' => 'Статус',
        ];
    }

    public function getDiscipline()
    {
        return $this->hasOne(Disciplines::class, ['id' => 'disciplines_id']);
    }
}
