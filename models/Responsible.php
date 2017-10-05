<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "responsible".
 *
 * @property integer $id
 * @property string $name
 * @property integer $role
 */
class Responsible extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'responsible';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['name'], 'required'],
            [['role'], 'integer'],
            [['name'], 'string', 'max' => 50],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'name' => 'Ответственный',
            'role' => 'Role',
        ];
    }
}
