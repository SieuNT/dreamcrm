<?php
namespace app\models;

use Yii;
use yii\base\Model;
use yii\behaviors\TimestampBehavior;

/**
 * Signup form
 */
class ChangePassword extends Model
{
    public $password;
    public $password_confirm;

    public function behaviors()
    {
        return [
            TimestampBehavior::className(),
        ];
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            ['password', 'required'],
            ['password', 'string', 'min' => 6],

            ['password_confirm', 'required'],
            ['password_confirm', 'compare', 'compareAttribute' => 'password', 'skipOnEmpty' => false],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'password' => Yii::t('app', 'Password'),
            'password_confirm' => Yii::t('app', 'Password Confirm'),
        ];
    }

    /**
     * Signs user up.
     *
     * @return User|null the saved model or null if saving fails
     */
    public function changePassword()
    {
        if (!$this->validate()) {
            return null;
        }
        $id = Yii::$app->user->identity->getId();

        $user = User::findOne($id);
        $user->setPassword($this->password);
        return $user->save() ? $user : null;
    }
}
