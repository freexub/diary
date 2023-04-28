<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "lesson_list".
 *
 * @property int $id
 * @property string $name
 * @property int|null $number
 * @property string|null $time_start
 * @property string|null $time_end
 */
class LessonList extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'lesson_list';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['name'], 'required'],
            [['number'], 'integer'],
            [['time_start', 'time_end'], 'safe'],
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
            'name' => 'Название урока',
            'number' => 'Номер урока',
            'time_start' => 'Time Start',
            'time_end' => 'Time End',
        ];
    }
}
