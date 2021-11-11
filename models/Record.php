<?php

namespace app\models;

use app\core\RecordModel;
use app\models\Product;
use PDO;
use PDOException;

class Record extends RecordModel 
{
    private $id;
    public function getId () { return $this->id; }
    private function setId ($id) { $this->id = $id; }

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

    private $create_at;
    public function getSaleDate () { return $this->create_at; }
    private function setSaleDate ($create_at) { $this->create_at = $create_at; }
    
    public function __construct(
        $userID,
        $productID,
        $quantity,
        $create_at = ''
    ) {
        $this->userID = $userID;
        $this->productID = $productID;
        $this->quantity = $quantity;
        $this->create_at = $create_at;
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
        $productModel = Product::getObject([ 'product' => 'product'], $this->productID);
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
        $records = array();
        $tablename = static::tableName();
        $sql = "SELECT * FROM $tablename";
        $statement = self::prepare($sql);
        if($statement->execute()) {
            while($statement->setFetchMode(PDO::FETCH_CLASS, 'Record')) {
                $record = $statement->fetch();
                array_push($records, $record);
            }
        }
        return $records;
    }
}