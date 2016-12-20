<?php
namespace app\models;

use yii\base\Model;

/**
 * Signup form
 */
class SignupForm extends Model
{
    public $username;
    public $email;
    public $password;
    public $password_confirm;
    public $full_name;
    public $phone_number;
    public $role;

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            ['username', 'trim'],
            ['username', 'required'],
            ['username', 'unique', 'targetClass' => '\app\models\User', 'message' => 'This username has already been taken.'],
            ['username', 'string', 'min' => 2, 'max' => 255],

            ['email', 'trim'],
            ['email', 'required'],
            ['email', 'email'],
            [['email', 'full_name', 'phone_number'], 'string', 'max' => 255],
            ['email', 'unique', 'targetClass' => '\app\models\User', 'message' => 'This email address has already been taken.'],

            ['password', 'required'],
            ['password', 'string', 'min' => 6],

            ['password_confirm', 'required'],
            ['password_confirm', 'compare', 'compareAttribute' => 'password', 'skipOnEmpty' => false],

            ['role', 'default', 'value' => User::ROLE_USER],
            ['role', 'in', 'range' => [User::ROLE_USER, User::ROLE_ADMIN]],
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
        $user->email = $this->email;
        $user->full_name = $this->full_name;
        $user->phone_number = $this->phone_number;
        $user->role = isset($this->role) ? $this->role : User::ROLE_USER;
        $user->setPassword($this->password);
        $user->generateAuthKey();

        return $user->save() ? $user : null;
    }
}
