<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "groups".
 *
 * @property integer $id
 * @property string $name
 * @property string $prof
 * @property string $class
 * @property string $date
 * @property string $level
 * @property integer $places
 * @property string $first
 * @property string $last
 * @property string $homework
 */
class Groups extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'groups';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['prof', 'name', 'class', 'date', 'level', 'first'], 'required'],
            [['places', 'id', 'prof'], 'integer'],
            [['first', 'last'], 'safe'],
            [['date'], 'string', 'max' => 50],
            [['class'], 'string', 'max' => 10],
            [['level'], 'string', 'max' => 20],
            [['homework'], 'string', 'max' => 200],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'name' => 'Группа',
            'prof' => 'Преподаватель',
            'class' => 'Аудитория',
            'date' => 'Время занятий',
            'level' => 'Уровень группы',
            'places' => 'Количество мест',
            'first' => 'Дата первого занятия',
            'last' => 'Дата окончания курса',
            'homework' => 'Домашнее задание',
        ];
    }

    public function getUser()
    {
        return $this->hasMany(Students::className(), ['group_id' => 'id']);
    }

    public function getTeachers()
    {
        return $this->hasOne(Teachers::className(), ['id' => 'prof']);
    }
}
