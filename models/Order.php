<?php

namespace app\models;

use app\core\CartModel;
use app\core\Database;
use app\core\DBModel;

class Order extends DBModel
{
    public string $id = '';
    public string $customer_id = '';
    public string $status = '';
    public string $payment_method = '';

    public function __construct($id, $customer_id, $status, $payment_method)
    {
        $this->id = $id;
        $this->customer_id = $customer_id;
        $this->status = $status;
        $this->payment_method = $payment_method;
    }

    public static function tableName(): string
    {
        return 'orders';
    }

    public function attributes(): array
    {
        return ['id', 'customer_id', 'status', 'payment_method'];
    }

    public function labels(): array
    {
        return [
            'id' => 'ID',
            'customer_id' => 'Customer ID',
            'status' => 'Status',
            'payment_method' => 'Payment method',
        ];
    }

    public function rules(): array
    {
        return [];
    }

    public static function create($customer_id, $payment_method)
    {
        $order = new Order(uniqid(), $customer_id, 'processing', $payment_method);
        $order->save();
    }

    public function save()
    {
        return parent::save();
    }

    public function getDisplayInfo(): string
    {
        return $this->list . ' ' . $this->status;
    }
}