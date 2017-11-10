<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "timetable".
 *
 * @property integer $id
 * @property string $days
 *  * @property string $time
 */
class Timetable extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'timetable';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['days', 'time'], 'required'],
            [['days'], 'string', 'max' => 200],
            [['time'], 'string', 'max' => 20],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'days' => 'Дни',
            'time' => 'Время'

        ];
    }

    public function getGroups()
    {
        return $this->hasMany(Groups::className(), ['date' => 'id']);
    }
}
