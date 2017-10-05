<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "recover".
 *
 * @property integer $id
 * @property integer $user_id
 * @property string $hash
 * @property string $expires
 */

class Recover extends \yii\db\ActiveRecord
{

    public static function tableName()
    {
        return 'recover';
    }

    public function rules()
    {
        return [
            [['user_id', 'hash', 'expires'], 'required'],
            [['user_id'], 'integer'],
            [['hash'], 'string', 'max' => 32],
            [['expires'], 'date', 'format' => 'php:Y-m-d H:i:s'],
        ];
    }

    /**
     * @inheritdoc
     */

    public function getUser()
    {
        return $this->hasOne(AdminUser::className(), ['id' => 'user_id']);
    }

    public static function findById($id)
    {
        return self::find()
            ->where(['user_id' => $id])
            ->orderBy([('expires') => SORT_DESC])
            ->one();
    }

    public static function findByHash($hash)
    {
        return self::find()
            ->where(['hash' => $hash])
            ->one();
    }

}