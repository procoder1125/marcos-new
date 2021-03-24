<?php

namespace common\models;

use Yii;
use yii\base\Model;

/**
 * Login form
 */
class LoginForm extends Model
{
    public $username;
    public $password;
    public $email;
    public $rememberMe = true;
    public $both;

    private $_user;


    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            ['username','string' ],
            ['both', 'string'],
            ['email', 'email'],
            // username and password are both required
            [['both', 'password'], 'required'],
            // rememberMe must be a boolean value
            ['rememberMe', 'boolean'],
            // password is validated by validatePassword()
            ['password', 'validatePassword'],
        ];
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
                $this->addError($attribute, 'Incorrect username or password.');
            }
        }
    }

    /**
     * Logs in a user using the provided username and password.
     *
     * @return bool whether the user is logged in successfully
     */
    public function login()
    {
        if ($this->validate() && User::isUserAdmin($this->both)) {
            return Yii::$app->user->login($this->getUser(), $this->rememberMe ? 3600 * 24 * 30 : 0);
          } else {
            return false;
          }     
    }
    
    public function flogin()
    {
        if ($this->validate() ) {
            return Yii::$app->user->login($this->getUser(), $this->rememberMe ? 3600 * 24 * 30 : 0);
          } else {
            return false;
          }
    }

    /**
     * Finds user by [[username]]
     *
     * @return User|null|static
     */
    protected function getUser()
    {
        if ($this->_user === null) {

            // in 'lwe' scenario we find user by email, otherwise by username

            // $this->_user = User::findByEmail($this->email);
           
            $this->_user = User::findByUsername($this->both);
            if(! $this->_user = User::findByUsername($this->both)) {
                $this->_user = User::findByEmail($this->both);
            }
        }

        return $this->_user;
    }

    protected function getAdminUser()
    {
        if ($this->_user === null) {

            // in 'lwe' scenario we find user by email, otherwise by username

            // $this->_user = User::findByEmail($this->email);
           
            $this->_user = User::findByUsername($this->username);
        }

        return $this->_user;
    }

    public function notActivated()
    {
        // if scenario is 'lwe' we will use email as our username, otherwise we use username
        $username = ($this->scenario === 'lwe') ? $this->email : $this->username;

        if ($user = User::userExists($username, $this->password, $this->scenario)) {
            if ($user->status === User::STATUS_INACTIVE) {
                return true;
            } else {
                return false;
            }
        }
    }

    public function loginAdmin()
    {
      if ($this->validate() && User::isUserAdmin($this->username)) {
        return Yii::$app->user->login($this->getUser(), $this->rememberMe ? 3600 * 24 * 30 : 0);
      } else {
        return false;
      }
    }
}
