<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "teachers".
 *
 * @property integer $id
 * @property string $name
 * @property string $email
 * @property string $phone
 * @property string $info
 */
class Teachers extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'teachers';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['name', 'email', 'phone', 'info'], 'required'],
            [['name'], 'string', 'max' => 50],
            [['email'], 'string', 'max' => 30],
            [['phone'], 'string', 'max' => 20],
            [['info'], 'string', 'max' => 1000],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'name' => 'ФИО Преподваетеля',
            'email' => 'E-mail Преподваетеля',
            'phone' => 'Телефон Преподваетеля',
            'info' => 'Информация',
        ];
    }

    public function getGroups()
    {
        return $this->hasMany(Groups::className(), ['prof' => 'id']);
    }
}
