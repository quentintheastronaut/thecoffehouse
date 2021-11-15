<?php

namespace app\models;

use app\core\CategoryModel;
use app\core\Database;
use app\core\DBModel;
use PDO;

class Category extends DBModel
{
    public string $id;
    public string $name;

    public function __construct(
        $id = '',
        $name = ''
    ) {
        $this->name = $name;
        $this->id = $id;
    }

    public function getDisplayName(): string
    {
        return $this->category_name;
    }

    public static function tableName(): string
    {
        return 'categories';
    }

    public function attributes(): array
    {
        return ['id', 'name'];
    }

    public function labels(): array
    {
        return [
            'name' => 'Name',
        ];
    }

    public function rules(): array
    {
        return [
            'name' => [self::RULE_REQUIRED, [self::RULE_MAX, 'max' <= 30]],
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

    public function update($category)
    {
        $statement = self::prepare(
            "UPDATE category 
             SET 
                 name = '" . $category->firstname . "', 
             WHERE id = '" . $category->id . "';
             "
        );
        $statement->execute();
        return true;
    }

    public static function getAll()
    {
        $list = [];
        $db = Database::getInstance();
        $req = $db->query('SELECT * FROM categories');

        foreach ($req->fetchAll() as $item) {
            $list[] = new Category($item['id'], $item['name']);
        }
        return $list;
    }

    public static function getAllCategories()
    {
        $list = [];
        $db = Database::getInstance();
        $req = $db->query('SELECT * FROM category');

        foreach ($req->fetchAll() as $item) {
            $list[] = new Category($item['id'], $item['name']);
        }
        return $list;
    }

    public static function get($id)
    {
        $db = Database::getInstance();
        $req = $db->query('SELECT * FROM category WHERE id = "' . $id . '"');
        $item = $req->fetchAll()[0];
        $category = new Category($item['id'], $item['name']);
        return $category;
    }
}