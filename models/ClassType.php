<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "class_type".
 *
 * @property int $id
 * @property string $name
 * @property string $about
 * @property int $active
 */
class ClassType extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'class_type';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['name'], 'required'],
            [['about'], 'string'],
            [['active'], 'integer'],
            [['name'], 'string', 'max' => 200],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'name' => 'Номер класса',
            'about' => 'Описание класса',
            'active' => 'Статус',
        ];
    }

    public function getNameYear(){
        return $this->name . ' год';
    }

}
