<?php

namespace app\models;

use Yii;
use yii\base\NotSupportedException;
use yii\web\IdentityInterface;

/**
 * This is the model class for table "user".
 *
 * @property integer $id
 * @property string $username
 * @property string $password
 * @property string $email
 * @property string $authKey
 * @property integer $user_type
 * @property integer $active
 * @property integer $user_id
 */
class AdminUser extends \yii\db\ActiveRecord implements IdentityInterface
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'user';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['username', 'email', 'active', 'user_type', 'password', 'authKey', 'user_id'], 'required'],
            [['user_id', 'id'], 'integer'],
            [['username', 'email', 'password', 'authKey'], 'string', 'max' => 50],
        ];
    }
    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'username' => 'Username',
            'password' => 'Password',
            'email' => 'E-mail',
            'active' => 'Active',
            'user_type' => 'User type',
            'authKey' => 'Auth Key',
            'user_id' => 'User ID',
        ];
    }

    public function getUser()
    {
        return $this->hasOne(Students::className(), ['id' => 'user_id']);
    }

    public function getAuthKey()
    {
        return $this->authKey;
    }

    public function getId()
    {
        return $this->id;
    }

    public function isAdmin()
    {
        return $this->user_id;
    }

    public function validateAuthKey($authKey)
    {
      return $this->authKey === $authKey;
    }

    public static function findIdentity($id)
    {
       return static::findOne($id);
    }

    public static function findIdentityByAccessToken($token, $type = null)
    {
        throw new NotSupportedException();
    }

    public static function findByUsername($username){
        return self::findOne(['username' => $username]);
    }

    public static function findByEmail($email){
        return self::findOne(['email' => $email]);
    }

    public function validatePassword($password){
        return $this->password === md5(md5($password));
    }

    public function validateEmail($email){
        return $this->email === $email;
    }
}
