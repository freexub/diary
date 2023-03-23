<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "profiles".
 *
 * @property int $user_id
 * @property string $sname
 * @property string $name
 * @property string $fname
 * @property string $birthday
 * @property string $adress
 * @property int $type_id
 * @property string $iin
 * @property string $date_update
 * @property string $date_create
 *
 * @property ProfilesType $type
 * @property User $user
 * @property StudentsClassrooms $user0
 */
class Profiles extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'profiles';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['user_id', 'sname', 'name', 'fname', 'birthday', 'adress', 'type_id', 'iin'], 'required'],
            [['user_id', 'type_id'], 'integer'],
            [['birthday', 'date_update', 'date_create'], 'safe'],
            [['adress'], 'string'],
            [['sname', 'name', 'fname'], 'string', 'max' => 50],
            [['iin'], 'string', 'max' => 20],
            [['type_id'], 'exist', 'skipOnError' => true, 'targetClass' => ProfilesType::class, 'targetAttribute' => ['type_id' => 'id']],
            [['user_id'], 'exist', 'skipOnError' => true, 'targetClass' => User::class, 'targetAttribute' => ['user_id' => 'id']],
            [['user_id'], 'exist', 'skipOnError' => true, 'targetClass' => StudentsClassrooms::class, 'targetAttribute' => ['user_id' => 'user_id']],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'user_id' => 'User ID',
            'sname' => 'Sname',
            'name' => 'Name',
            'fname' => 'Fname',
            'birthday' => 'Birthday',
            'adress' => 'Adress',
            'type_id' => 'Type ID',
            'iin' => 'Iin',
            'date_update' => 'Date Update',
            'date_create' => 'Date Create',
        ];
    }

    /**
     * Gets query for [[Type]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getType()
    {
        return $this->hasOne(ProfilesType::class, ['id' => 'type_id']);
    }

    /**
     * Gets query for [[User]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getUser()
    {
        return $this->hasOne(User::class, ['id' => 'user_id']);
    }

    /**
     * Gets query for [[User0]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getUser0()
    {
        return $this->hasOne(StudentsClassrooms::class, ['user_id' => 'user_id']);
    }
}
