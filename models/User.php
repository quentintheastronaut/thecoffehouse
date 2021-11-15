<?php

namespace app\models;

use app\core\Database;
use app\core\UserModel;
use PDO;
use PDOException;

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

    public function loadData($params)
    {
        $this->id = $params[0];
        $this->firstname = $params[1];
        $this->lastname = $params[2];
        $this->email = $params[3];
        $this->password = $params[4];
        $this->address = $params[5];
        $this->phone_number = $params[6];
        $this->role = $params[7];
    }

    public function getId()
    {
        return $this->id;
    }
    public function getRole()
    {
        return $this->role;
    }
    public function setRole($role)
    {
        $this->role = $role;
    }

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
            'firstname' => 'First name',
            'lastname' => 'Last name',
            'email' => 'Email',
            'password' => 'Password',
            'passwordConfirm' => 'Password Confirm',
            'phone_number' => 'Phone number',
            'address' => 'Address',
            'role' => 'Role'
        ];
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

    public function save()
    {
        $this->password = password_hash($this->password, PASSWORD_DEFAULT);
        $this->id = uniqid();
        return parent::save();
    }

    public function getDisplayName(): string
    {
        return $this->firstname . ' ' . $this->lastname;
    }

    public static function getAll()
    {
        $list = [];
        $db = Database::getInstance();
        $req = $db->query('SELECT * FROM users');

        foreach ($req->fetchAll() as $item) {
            $userModel = new User;
            $params = array($item['id'], $item['firstname'], $item['lastname'], $item['email'], $item['address'], $item['phone_number'], $item['role']);
            $userModel->loadData($params);
            array_push($list, $userModel);
        }

        return $list;
    }

    public static function getUserInfo($id)
    {
        $db = Database::getInstance();
        $req = $db->query('SELECT * FROM customers WHERE id = "' . $id . '"');
        $item = $req->fetchAll()[0];
        $userModel = new User;
        $params = array($item['id'], $item['firstname'], $item['lastname'], $item['email'], $item['password'], $item['address'], $item['phone_number'], $item['role']);
        $userModel->loadData($params);
        return $userModel;
    }

    public function getLabel($attribute)
    {
        return $this->labels()[$attribute];
    }

    public function delete()
    {
        $tablename = $this->tableName();
        $db = Database::getInstance();
        $db->query('DELETE * FROM "' . $tablename . '" WHERE id = "' . $this->id . '"');
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