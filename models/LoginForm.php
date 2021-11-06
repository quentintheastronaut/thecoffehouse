<?php

namespace app\models;

use app\core\Application;
use app\core\Model;

class LoginForm extends Model
{
    public string $email = '';
    public string $password = '';

    public function rules(): array
    {
        return [
            'email' => [self::RULE_REQUIRED],
            'password' => [self::RULE_REQUIRED],
        ];
    }

    public function labels()
    {
        return [
            'email' => 'Your Email address',
            'password' => 'Password'
        ];
    }

    public function login()
    {
        $customer = Customer::findOne(['email' => $this->email]);
        if (!$customer) {
            $this->addError('email', 'Customer does not exist with this email address');
            return false;
        }
        if (!password_verify($this->password, $customer->password)) {
            $this->addError('password', 'Password is incorrect');
            return false;
        }

        return Application::$app->login($customer);
    }
}