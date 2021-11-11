<?php

namespace app\models;

use app\core\Application;
use app\core\Database;
use app\core\Model;
use app\core\ProductModel;
use app\core\Request;
use app\core\DBModel;

class Product extends DBModel
{
    public string $id;
    public string $category_id;
    public string $name;
    public float $price;
    public string $description;
    public string $image_url;
    public string $create_at;
    public string $update_at;

    public function __construct(
        $id = '',
        $category_id = '',
        $name = '',
        $price = 0,
        $description = '',
        $image_url = ''
    ) {
        $this->id = $id;
        $this->category_id = $category_id;
        $this->name = $name;
        $this->price = $price;
        $this->description = $description;
        $this->image_url = $image_url;
    }

    public function setId($id)
    {
        $this->id = $id;
    }
    public function getId()
    {
        return $this->id;
    }

    public function setCategoryId($category_id)
    {
        $this->category_id = $category_id;
    }
    public function getCategoryId()
    {
        return $this->category_id;
    }

    public function setName($name)
    {
        $this->name = $name;
    }
    public function getname()
    {
        return $this->name;
    }

    public function setPrice($price)
    {
        $this->price = $price;
    }
    public function getPrice()
    {
        return $this->price;
    }

    public function setDescription($description)
    {
        $this->description = $description;
    }
    public function getDescription()
    {
        return $this->description;
    }

    public function setQuantity($quantity)
    {
        $this->quantity = $quantity;
    }
    public function getQuantity()
    {
        return $this->quantity;
    }

    public function getDisplayInfo(): string
    {
        return $this->id . ' ' . $this->category_id . ' ' . $this->name . ' ' . $this->quantity . ' ' . $this->price . ' ' . $this->description . ' ' . $this->create_at;
    }

    public static function tableName(): string
    {
        return 'products';
    }

    public function attributes(): array
    {
        return ['id', 'product_id', 'customer_id', 'price', 'comment', 'create_at'];
    }

    public function labels(): array
    {
        return [
            'name' => 'Product name',
            'price' => 'Price',
            'description' => 'Description',
        ];
    }

    public function rules(): array
    {
        return [
            'name' => [self::RULE_REQUIRED, [self::RULE_MIN, 'max' <= 50]],
            'description' => [self::RULE_REQUIRED, [self::RULE_MIN, 'min' >= 20], [self::RULE_MAX, 'max' <= 100]],
            'price' => [self::RULE_REQUIRED],
        ];
    }

    public function save()
    {
        $this->create_at = date("Y-m-d" . " H:i:s", time() + 7 * 3600);
        $this->id = uniqid();
        return parent::save();
    }

    public function update()
    {
        $this->update_at = date("Y-m-d" . " H:i:s", time() + 7 * 3600);
        return parent::update();
    }

    public function create()
    {
    }

    public function edit()
    {
    }

    public function delete()
    {
    }

    public static function getAll()
    {

        $models = [];
        return $models;
    }

    public static function getAllProducts()
    {
        $list = [];
        $db = Database::getInstance();
        $req = $db->query('SELECT * FROM products');

        foreach ($req->fetchAll() as $item) {
            $list[] = new Product($item['id'], $item['category_id'], $item['name'], $item['price'], $item['description'], $item['image_url']);
        }

        return $list;
    }

    public static function getProductDetail($id)
    {
        $db = Database::getInstance();
        $req = $db->query('SELECT * FROM products WHERE id = "' . $id . '"');
        $item = $req->fetchAll()[0];
        $product = new Product($item['id'], $item['category_id'], $item['name'], $item['price'], $item['description'], $item['image_url']);
        return $product;
    }
}