<?php

namespace app\models;

use app\core\CartModel;
use app\core\Database;
use app\core\DBModel;

class Cart extends DBModel
{
    public string $id = '';
    public string $customer_id = '';
    public string $status = '';

    public function __construct($id, $customer_id, $status)
    {
        $this->id = $id;
        $this->customer_id = $customer_id;
        $this->status = $status;
    }

    public static function tableName(): string
    {
        return 'cart';
    }

    public function attributes(): array
    {
        return ['id', 'customer_id', 'status'];
    }

    public function labels(): array
    {
        return [
            'id' => 'ID',
            'customer_id' => 'Customer ID',
            'status' => 'Status',
        ];
    }

    public function rules(): array
    {
        return [];
    }

    public static function create($id)
    {
        $cart = new Cart(uniqid(), $id, 'processing');
        $cart->save();
    }

    public function save()
    {
        return parent::save();
    }

    public static function findCart($id)
    {
        $cart = Cart::getCart($id);
        if (count($cart) == 0) {
            return false;
        } else {
            return true;
        }
    }

    public function getDisplayInfo(): string
    {
        return $this->list . ' ' . $this->status;
    }


    public static function getCart($id)
    {
        $list = [];
        $db = Database::getInstance();
        $req = $db->query("SELECT * FROM cart WHERE customer_id = '" . $id . "' AND status = 'processing'");


        foreach ($req->fetchAll() as $item) {
            $list[] = new Cart(
                $item['id'],
                $item['customer_id'],
                $item['status']
            );
        };

        return $list;
    }
}