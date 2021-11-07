<?php

namespace app\models;

use app\core\ProductModel;

class Product extends ProductModel
{
    public string $id;
    public string $category_id;
    public string $name;
    public float $price;
    public string $description;
    public string $create_at;
    
    public function __construct()
    {
        $this->id = '';
        $this->category_id = '';
        $this->name = '';
        $this->price = 0;
        $this->description = '';
        $this->create_at = '';
        parent::__construct();
    }

    public function getDisplayInfo(): string
    {
        return $this->id . ' ' . $this->category_id . ' ' . $this->name . ' ' . $this->price . ' ' . $this->description . ' ' . $this->create_at;
    }

    public static function tableName(): string
    {
        return 'feedbacks';
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
        return parent::save();
    }
}