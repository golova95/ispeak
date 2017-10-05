<?php

namespace app\models;

use Yii;
use yii\base\Model;
use app\models\Recover;

/** RecoverForm is the model behind the recover form. */
class RecoverForm extends Model
{
    public $ps1;
    public $ps2;


    public function rules()
    {
        return [
            // username and password are both required
            ['ps1', 'required', 'message' => 'Введите пароль.'],
            ['ps2', 'required', 'message' => 'Повторите пароль.']
        ];
    }

    public function ValidatePassword($attribute){
        $this->addError($attribute, 'Неверный логин или пароль');
    }



    public function Recover($id, $password)
    {
        $user = AdminUser::findOne($id);
        $user->password = md5(md5($password));
        $user->active = 1;
        $user->update();

        return $user->errors;
    }




    /**
     * Finds user by [[hash]]
     *
     * @return Recover|null
     */

    public function GetRecoverUser($hash)
    {
        return Recover::findByHash($hash);
    }
}