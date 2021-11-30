<?php

namespace app\models;

use app\core\Application;
use app\core\CartModel;
use app\core\Database;
use app\core\DBModel;

class Order extends DBModel
{
    public string $id = '';
    public string $user_id = '';
    public string $payment_method = '';
    public string $status = '';
    public string $delivery_name = '';
    public string $delivery_phone = '';
    public string $delivery_address = '';
    public string $created_at = '';

    public function __construct(
        $id,
        $user_id,
        $payment_method,
        $status,
        $delivery_name,
        $delivery_phone,
        $delivery_address,
        $created_at = ''
    ) {
        $this->id = $id;
        $this->user_id = $user_id;
        $this->payment_method = $payment_method;
        $this->status = $status;
        $this->delivery_name = $delivery_name;
        $this->delivery_phone = $delivery_phone;
        $this->delivery_address = $delivery_address;

        if ($created_at != '') {
            $this->created_at = $created_at;
        }
    }

    public static function tableName(): string
    {
        return 'orders';
    }

    public function attributes(): array
    {
        return [
            'id',
            'user_id',
            'payment_method',
            'status',
            'delivery_name',
            'delivery_phone',
            'delivery_address',
        ];
    }

    public function labels(): array
    {
        return
            [
                'id' => 'ID',
                'user_id' => 'User ID',
                'payment_method' => 'Payment method',
                'status' => 'Status',
                'delivery_name' => 'Delivery name',
                'delivery_phone' => 'Delivery phone',
                'delivery_address' => 'Delivery address',
            ];
    }

    public function rules(): array
    {
        return [];
    }

    public static function create($user_id, $payment_method, $delivery_name, $delivery_phone, $delivery_address)
    {
        $order = new Order(uniqid(), $user_id, $payment_method, 'processing', $delivery_name, $delivery_phone, $delivery_address);
        $order->save();
    }

    public function save()
    {
        return parent::save();
    }

    public static function getOrders($id)
    {
        $list = [];
        $db = Database::getInstance();
        $req = $db->query("SELECT * FROM orders WHERE user_id = '" . $id . "' ORDER BY status DESC ,created_at DESC");

        foreach ($req->fetchAll() as $item) {
            $list[] = new Order(
                $item['id'],
                $item['user_id'],
                $item['payment_method'],
                $item['status'],
                $item['delivery_name'],
                $item['delivery_phone'],
                $item['delivery_address'],
                $item['created_at']
            );
        };

        return $list;
    }

    public static function getOrderItem($order_id)
    {
        $list = [];
        $db = Database::getInstance();
        $req = $db->query(
            "SELECT *
            FROM cart_detail JOIN products ON cart_detail.product_id = products.id 
            WHERE cart_detail.cart_id = '" . $order_id . "';"
        );

        foreach ($req->fetchAll() as $item) {
            $list[] = new
                OrderItem(
                    $item['product_id'],
                    $item['cart_id'],
                    $item['quantity'],
                    $item['note'],
                    $item['category_id'],
                    $item['name'],
                    $item['price'],
                    $item['description'],
                    $item['image_url'],
                    $item['size']
                );
        }
        return $list;
    }

    public static function getOrderById($id)
    {
        $db = Database::getInstance();
        $req = $db->query('SELECT * FROM orders WHERE id = "' . $id . '"');
        $item = $req->fetchAll()[0];
        $order = new Order(
            $item['id'],
            $item['user_id'],
            $item['payment_method'],
            $item['status'],
            $item['delivery_name'],
            $item['delivery_phone'],
            $item['delivery_address'],
            $item['created_at']
        );
        return $order;
    }
}