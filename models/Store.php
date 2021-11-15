<?php

namespace app\models;

use app\core\StoreModel;
use app\core\Database;
use PDO;

class Store extends StoreModel
{
    private string $id;
    private string $name;
    private string $address;
    private string $hotline;
    
    public function __construct(
        $id = '',
        $name = '',
        $address = '',
        $hotline = ''
    ) {
        $this->id = $id;
        $this->name = $name;
        $this->hotline = $hotline;
        $this->address = $address;
    }

    public function getDisplayInfo(): string
    {
        return $this->name . ' ' . $this->address . ' ' . $this->hotline;
    }

    public static function tableName(): string
    {
        return 'stores';
    }

    public function attributes(): array
    {
        return ['id', 'name', 'address', 'hotline'];
    }

    public function labels(): array
    {
        return [
            'name' => 'Name',
            'address' => 'Address',
            'hotline' => 'Hotline'
        ];
    }

    public function rules(): array
    {
        return [
            'name' => [self::RULE_REQUIRED, [self::RULE_MAX, 'max' <= 40]],
            'hotline' => [self::RULE_REQUIRED, [self::RULE_UNIQUE, [self::RULE_MAX, 'max' <= 13]]],
            'address' => [self::RULE_REQUIRED, [self::RULE_UNIQUE, [self::RULE_MAX, 'max' <= 70]]]
        ];
    }

    public function save()
    {
        $this->id = uniqid();
        return parent::save();
    }

    public function delete()
    {
        $tablename = $this->tableName();
        $sql = "DELETE FROM $tablename WHERE id=?";
        $stmt= self::prepare($sql);
        $stmt->execute([$this->id]);
        return true;
    }

    public function update($store)
    {
        $statement = self::prepare(
            "UPDATE customers 
             SET 
                 name = '" . $store->name . "', 
                 hotline = '" . $store->hotline . "',
                 address = '" . $store->address . "'
             WHERE id = '" . $store->id . "';
             "
        );
        $statement->execute();
        return true;        
    }

    public static function getAll()
    {
        $list = [];
        $db = Database::getInstance();
        $req = $db->query('SELECT * FROM storees');

        foreach ($req->fetchAll() as $item) {
            $list[] = new Store($item['id'], $item['name'], $item['hotline'], $item['address']);
        }
        return $list;
    }

    public static function get($id)
    {
        $db = Database::getInstance();
        $req = $db->query('SELECT * FROM stores WHERE id = "' . $id . '"');
        $item = $req->fetchAll()[0];
        $store = new Store($item['id'], $item['name'], $item['hotline'], $item['address']);
        return $store;
    }
}