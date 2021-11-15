<?php

namespace app\models;

use app\core\UserModel;
use app\core\Database;

class User extends UserModel
{
    public string $id = '';
    public string $firstname = '';
    public string $lastname = '';
    public string $email = '';
    public string $password = '';
    public string $passwordConfirm = '';
    public string $address = '';
    public string $phone_number = '';
    public string $role = '';


    public static function tableName(): string
    {
        return 'customers';
    }


    public function attributes(): array
    {
        return ['id', 'firstname', 'lastname', 'email', 'password', 'phone_number', 'address', 'role'];
    }

    public function labels(): array
    {
        return [
            'firstname' => 'Tên',
            'lastname' => 'Họ',
            'email' => 'Email',
            'password' => 'Mật khẩu',
            'passwordConfirm' => 'Xác thực mật khẩu',
            'phone_number' => 'Số điện thoại',
            'address' => 'Địa chỉ',
        ];
    }

    public function getLabel($attribute)
    {
        return $this->labels()[$attribute];
    }

    public function rules(): array
    {
        return [
            'firstname' => [self::RULE_REQUIRED],
            'lastname' => [self::RULE_REQUIRED],
            'email' => [self::RULE_REQUIRED, self::RULE_EMAIL, [
                self::RULE_UNIQUE, 'class' => self::class
            ]],
            'password' => [self::RULE_REQUIRED, [self::RULE_MIN, 'min' => 8]],
            'passwordConfirm' => [[self::RULE_MATCH, 'match' => 'password']],
        ];
    }

    // Save này chỉ dùng lưu user, viết lại save khác cho model khác pls
    public function save()
    {
        $this->password = password_hash($this->password, PASSWORD_DEFAULT);
        $this->id = uniqid();
        $this->role = 'client';
        return parent::save();
    }

    public function getDisplayName(): string
    {
        return $this->firstname . ' ' . $this->lastname;
    }

    public static function getUserInfo($id)
    {
        $db = Database::getInstance();
        $req = $db->query('SELECT * FROM customers WHERE id = "' . $id . '"');
        $item = $req->fetchAll()[0];
        $user = new User();
        $user->id = $item['id'];
        $user->firstname = $item['firstname'];
        $user->lastname = $item['lastname'];
        $user->email = $item['email'];
        $user->address = $item['address'];
        $user->phone_number = $item['phone_number'];
        $user->role = $item['role'];
        return $user;
    }

    public static function updateProfile($user)
    {
        $statement = self::prepare(
            "UPDATE customers 
            SET 
                firstname = '" . $user->firstname . "', 
                lastname = '" . $user->lastname . "',
                phone_number = '" . $user->phone_number . "',
                address = '" . $user->address . "'
            WHERE id = '" . $user->id . "';
            "
        );
        $statement->execute();
        return true;
    }
}