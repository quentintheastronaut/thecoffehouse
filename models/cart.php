<?php

namespace app\models;

use app\core\CartModel;

class Cart extends CartModel 
{
    public array $list;
    public int $status;
    
    public function __construct()
    {
        $this->status = 0;
        $this->list = [];
    }
    
    public static function tableName(): string
    {
        return 'carts';
    }

    public function attributes(): array
    {
        return ['list'];
    }

    public function labels(): array
    {
        return [
            'records' => 'Records',
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
        return $this->records . ' ' . $this->status;
    }

    public function insert(Product $product)
    {
        
        $recordModel = new Record(Application::$app->session->get('user'), $product->getId(), 1);
        $exists = Application::$app->session->exists('cart');
        if(!$exists) {
            Application::$app->session->setFlash('cart', 'Initiate cart');
            $userID = Application::$app->session->get('user');
            $cart = Application::$app->session->get('cart');
            Application::$app->session->set('cart', $userID);
            array_push($cart->records, $recordModel);
            return;
        } else {
            $cart = Application::$app->session->get('cart');
            $records = $cart->records;
            foreach($records as $record) {
                if($record->getProductID() == $product->getId()) {
                    $record->setQuantity($record->getQuantity() + 1);
                    return;
                }
            }
            array_push($cart->records, $recordModel);
        }
            
    }
}