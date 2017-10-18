<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "students".
 *
 * @property integer $id
 * @property string $name
 * @property string $email
 * @property string $phone
 * @property string $from
 * @property integer $responsible_id
 * @property integer $appointed_id
 * @property integer $confirmed_id
 * @property string $purpose
 * @property string $test_level
 * @property integer $group_id
 * @property double $deposit
 * @property integer $payments
 * @property string $payment_type
 * @property integer $test_mark
 * @property integer $last_date
 * @property string $comment
 */
class Students extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'students';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['name', 'email', 'phone', 'purpose', 'test_level', 'deposit', 'course_id'], 'required'],
            [['responsible_id', 'appointed_id', 'confirmed_id', 'group_id', 'payments', 'test_mark'], 'integer'],
            [['deposit'], 'number'],
            [['last_date'], 'safe'],
            [['name', 'email', 'purpose', 'course_id'], 'string', 'max' => 50],
            [['from', 'phone', 'test_level'], 'string', 'max' => 20],
            [['payment_type'], 'string', 'max' => 40],
            [['comment'], 'string', 'max' => 5000],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'name' => 'ФИО',
            'email' => 'E-mail',
            'phone' => 'Телефон',
            'from' => 'Источник',
            'responsible_id' => 'Ответственный',
            'appointed_id' => 'Встречу назначил',
            'confirmed_id' => 'Встречу подтвердил',
            'purpose' => 'Цель изучения',
            'course_id' => 'Тип курса',
            'test_level' => 'Уровень при тесте',
            'group_id' => 'Группа',
            'deposit' => 'Регистрационный взнос',
            'payments' => 'Платежи',
            'payment_type' => 'Способ платежа',
            'test_mark' => 'Оценка при тесте',
            'last_date' => 'Последнее занятие',
            'comment' => 'Комментарий',
        ];
    }

    static function getClassmates($id, $group_id)
    {
        $classmates = Students::find()
            ->where(['!=', 'id', $id])
            ->andWhere(['group_id' => $group_id])
            ->all();

        return $classmates;
    }

    public function getGroup()
    {
        return $this->hasOne(Groups::className(), ['id' => 'group_id']);
    }

    public function getLogin()
    {
        return $this->hasOne(AdminUser::className(), ['user_id' => 'id']);
    }

    public function getResponsible()
    {
        return $this->hasOne(Responsible::className(), ['id' => 'responsible_id']);
    }

    public function getAppointed()
    {
        return $this->hasOne(Responsible::className(), ['id' => 'appointed_id']);
    }

    public function getConfirmed()
    {
        return $this->hasOne(Responsible::className(), ['id' => 'confirmed_id']);
    }

    public function getProducts()
    {
        return $this->hasOne(Products::className(), ['id' => 'course_id']);
    }
}
