<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "students_classrooms".
 *
 * @property int $user_id
 * @property int $classroom_id
 * @property string $date_update
 * @property string $date_create
 *
 * @property Profiles[] $profiles
 */
class StudentsClassrooms extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'students_classrooms';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['classroom_id'], 'required'],
            [['classroom_id'], 'integer'],
            [['date_update', 'date_create'], 'safe'],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'user_id' => 'User ID',
            'classroom_id' => 'Classroom ID',
            'date_update' => 'Date Update',
            'date_create' => 'Date Create',
        ];
    }

    /**
     * Gets query for [[Profiles]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getProfiles()
    {
        return $this->hasMany(Profiles::class, ['user_id' => 'user_id']);
    }
}
