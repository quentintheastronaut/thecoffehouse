<?php

namespace app\models;

use app\core\FeedbackModel;
use PDO;

class Feedback extends FeedbackModel
{
    public string $id;
    public string $customer_id;
    public string $product_id;
    public float $start;
    public string $comment;
    public string $create_at;
    
    public function __construct(
        $customer_id = '',
        $product_id = '',
        $start = 0,
        $comment = ''
    ) {
        $this->customer_id = $customer_id;
        $this->product_id = $product_id;
        $this->starts = $start;
        $this->comment = $comment;
    }

    public function getDisplayInfo(): string
    {
        return $this->product_id . ' ' . $this->customer_id . ' ' . $this->comment . ' ' . $this->start . ' ' . $this->create_at;
    }

    public static function tableName(): string
    {
        return 'feedbacks';
    }

    public function attributes(): array
    {
        return ['id', 'product_id', 'customer_id', 'start', 'comment'];
    }

    public function labels(): array
    {
        return [
            'product_id' => 'Product id',
            'customer_id' => 'Customer id',
            'comment' => 'Comment',
            'start' => 'Average rating',
            'create_at' => 'Created at',
        ];
    }

    public function rules(): array
    {
        return [
            'comment' => [self::RULE_REQUIRED, [self::RULE_MIN, 'min' => 10]],
            'start' => [self::RULE_REQUIRED, [self::RULE_MIN, 'min' >= 1], [self::RULE_MAX, 'max' <= 5]],
        ];
    }

    public function save()
    {
        $this->id = uniqid();
        return parent::save();
    }

    public static function getAll()
    {
        $feedbacks = array();
        $tablename = static::tableName();
        $sql = "SELECT * FROM $tablename";
        $statement = self::prepare($sql);
        if($statement->execute()) {
            while($statement->setFetchMode(PDO::FETCH_CLASS, 'Feedback')) {
                $feedback = $statement->fetch();
                array_push($feedbacks, $feedback);
            }
        }
        return $feedbacks;
    }
}