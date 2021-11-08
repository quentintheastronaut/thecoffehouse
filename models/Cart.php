<?php

namespace app\models;

use app\core\CartModel;

class Cart extends CartModel 
{
    public string $id;
    public string $customer_id;
    public int $status;
    public array $list;
    public float $totalprice;
    public string $create_at;
    
    public function __construct()
    {
        $this->id = '';
        $this->customer_id = '';
        $this->status = 0;
        $this->list = [];
        $this->totalprice = 0;
        $this->create_at = '';
        return parent::__construct();
    }
    
    public static function tableName(): string
    {
        return 'carts';
    }

    public function attributes(): array
    {
        return ['id', 'customer_id', 'list', 'totalpirce', 'status', 'create_at'];
    }

    public function labels(): array
    {
        return [
            'totalprice' => 'Total price',
            'status' => 'Status',
        ];
    }

    public function rules(): array
    {
        return [];
    }

    public function save()
    {
        return parent::save();
    }

    public function getDisplayInfo(): string
    {
        return $this->customer_id . ' ' . $this->list . ' ' . $this->status . ' ' . $this->create_at;
    }

}