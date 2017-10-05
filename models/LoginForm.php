<?php

namespace app\models;

use Yii;
use yii\base\Model;
use app\models\Recover;

/**
 * LoginForm is the model behind the login form.
 *
 * @property User|null $user This property is read-only.
 *
 */
class LoginForm extends Model
{
    public $username;
    public $password;
    public $email;
    public $rememberMe = true;

    private $_user = false;


    /**
     * @return array the validation rules.
     */
    public function rules()
    {
        return [
            // username and password are both required
            [['username','password'], 'required', 'message' => 'Введите {attribute}.'],

            // rememberMe must be a boolean value
            ['rememberMe', 'boolean'],
            // password is validated by validatePassword()
            ['password', 'validatePassword'],
            // email is validated by validateEmail()
            ['email', 'validateEmail'],
        ];
    }

    public function scenarios()
    {
        $scenarios = [
            'some_scenario' => ['email'],
        ];

        return array_merge(parent::scenarios(), $scenarios);
    }

    /**
     * Validates the password.
     * This method serves as the inline validation for password.
     *
     * @param string $attribute the attribute currently being validated
     * @param array $params the additional name-value pairs given in the rule
     */
    public function validatePassword($attribute, $params)
    {
        if (!$this->hasErrors()) {
            $user = $this->getUser();

            if (!$user || !$user->validatePassword($this->password)) {
                $this->addError($attribute, 'Неверный логин или пароль');
            }
        }
    }

    public function validateEmail($attribute, $params)
    {
        if (!$this->hasErrors()) {
            $user = $this->getUserByEmail();
            if ($user->email != $this->email) {
                $this->addError($attribute, 'Incorrect Email');
            }
        }
    }

    /**
     * Logs in a user using the provided username and password.
     * @return bool whether the user is logged in successfully
     */
    public function login()
    {
        if ($this->validate()) {
            return Yii::$app->user->login($this->getUser(), $this->rememberMe ? 3600*24*30 : 0);
        }
        return false;
    }

    public function restore()
    {
        $user = $this->getUserByEmail();
        if ($user->username){
            if(!$this -> getRecover($user->id) || strtotime($this->getRecover($user->id)->expires) < time()) {
                $string = md5($user->username.$user->password.time());

                if ($this->contact($user->email, $string)) {

                    $recover = new Recover();
                    $recover->user_id = $user->id;
                    $recover->hash = $string;
                    $recover->expires = date("Y-m-d H:i:s", time() + 3600);
                    $recover->save();

                    return $this->getUserByEmail()->username;
                } else {
                    $this->addError('email', 'Произошла ошибка');
                }
            }else{
                $this->addError('email', 'Сообщение уже отправлено');
            }
        }else {
            $this->addError('email', 'Incorrect Email');
        }
    }

    public function contact($email, $string)
    {
            Yii::$app->mailer->compose()
                ->setTo($email)
                ->setFrom('ispeak@gmail.com')
                ->setSubject("Order")
                ->setHtmlBody("
                <a href='http://learn.ispeak-school.by/recover?hash=$string'>link</a>
                ")
                ->send();

            return true;
    }

    /**
     * Finds user by [[username]]
     *
     * @return AdminUser|null
     */
    public function getUser()
    {
        if ($this->_user === false) {
                $this->_user = AdminUser::findByUsername($this->username);
        }

        return $this->_user;
    }

    public function getUserByEmail()
    {
        if ($this->_user === false) {
                $this->_user = AdminUser::findByEmail($this->email);
        }

        return $this->_user;
    }


    /**
     * Finds user by [[id]]
     *
     * @return Recover|null
     */
    public function getRecover($id)
    {
        return $recover = Recover::findById($id);
    }
}
