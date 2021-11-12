<?php

namespace app\models;

use app\core\Database;
use app\core\RecordModel;
use app\models\Product;
use PDO;
use PDOException;

class Record extends RecordModel 
{
    private $userID;
    public function getUserID () { return $this->userID; }
    private function setUserID ($userID) { $this->userID = $userID; }

    private $productID;
    public function getProductID() { return $this->productID; }
    private function setProductID ($productID) { $this->productID = $productID; }

    private $quantity;
    public function getQuantity() { return $this->quantity; }
    private function setQuantity($quantity) { $this->quantity = $quantity; }

    private $totalPrice;
    public function getTotalPrice() { return $this->totalPrice; }
    private function setTotalPrice($totalPrice) { $this->totalPrice = $totalPrice; }
    
    public function __construct(
        $userID,
        $productID,
        $quantity
    ) {
        $this->userID = $userID;
        $this->productID = $productID;
        $this->quantity = $quantity;
    }
    
    public static function tableName(): string
    {
        return 'records';
    }

    public function attributes(): array
    {
        return ['ID', 'USERID', 'PRODUCTID', 'QUANTITY', 'SALEDATE'];
    }

    public function labels(): array
    {
        return [
            'SALEDATE' => 'Sale Date',
        ];
    }

    public function rules(): array
    {
        return [];
    }

    public function save()
    {
        $productModel = Product::getProductDetail($this->productID);
        $this->id = uniqid();
        $this->totalPrice = $productModel->getPrice() * $this->quantity;
        return parent::save();
    }

    public function getDisplayInfo(): string
    {
        return $this->userID . ' ' . $this->totalPrice . ' ' . $this->create_at;
    }

    public function create()
    {
        
    }

    public function delete()
    {
        $tablename = $this->tableName();
        $id = $this->id;
        $sql = "DELETE FROM $tablename WHEHRE ID = :ID";
        $statement = self::prepare($sql);
        $statement->bindParam(':ID', $id, PDO::PARAM_INT);
        $statement->execute();
    }

    public static function getAll()
    {
        $list = [];
        $db = Database::getInstance();
        $req = $db->query('SELECT * FROM records');

        foreach ($req->fetchAll() as $item) {
            $list[] = new Record($item['customer_id'], $item['quantity'], $item['price']);
        }

        return $list;
    }

    public static function get($id)
    {
        $db = Database::getInstance();
        $req = $db->query('SELECT * FROM records WHERE id = "' . $id . '"');
        $item = $req->fetchAll()[0];
        $record = new Record($item['customer_id'], $item['quantity'], $item['price']);
        return $record; 
    }
}