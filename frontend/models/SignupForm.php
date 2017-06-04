<?php
namespace frontend\models;

use yii\base\Model;
use common\models\User;

/**
 * Signup form
 */
class SignupForm extends Model
{
    public $username;
   // public $email;
    public $password;
    public $passwordRepeat;


    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            ['username', 'trim'],
            ['username', 'required', 'message' => 'Имя пользователя не может быть пустым.'],
            ['username', 'unique', 'targetClass' => '\common\models\User', 'message' => 'Имя пользователя уже существует.'],
            ['username', 'string', 'min' => 2, 'max' => 60, 'message' => 'Имя пользователя не может быть менее 2, либо более 60 символов.'],

            ['password', 'required', 'message' => 'Пароль не может быть пустым.'],
            ['password', 'string', 'min' => 6, 'message' => 'Пароль не может быть менее 6 символов.'],

            ['passwordRepeat', 'compare', 'compareAttribute' => 'password', 'message' => 'Пароли не совпадают.']
        ];
    }

    /**
     * Signs user up.
     *
     * @return User|null the saved model or null if saving fails
     */
    public function signup()
    {
        if (!$this->validate()) {
            return null;
        }
        
        $user = new User();
        $user->username = $this->username;
        $user->setPassword($this->password);
        $user->generateAuthKey();
        
        return $user->save() ? $user : null;
    }
}
