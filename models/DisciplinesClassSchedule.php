<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "disciplines_class_schedule".
 *
 * @property int $id
 * @property int $disciplines_class_list_id
 * @property int $lesson_list_id
 * @property int $day
 */
class DisciplinesClassSchedule extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'disciplines_class_schedule';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['disciplines_class_list_id', 'lesson_list_id', 'day'], 'required'],
            [['disciplines_class_list_id', 'lesson_list_id', 'day'], 'integer'],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'disciplines_class_list_id' => 'Класс',
            'lesson_list_id' => 'Номер урока',
            'day' => 'День недели',
        ];
    }

    public function getAllClasses(){
        return ListClass::find()->all();
    }

    public function getAllLessons(){
        return LessonList::find()->all();
    }

    public function getClassType()
    {
        return $this->hasOne(DisciplinesClassroom::class, ['id' => 'disciplines_class_list_id']);
    }

    public function getLessonList()
    {
        return $this->hasOne(LessonList::class, ['id' => 'lesson_list_id']);
    }
}
