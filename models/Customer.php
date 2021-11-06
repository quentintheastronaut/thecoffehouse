<?php
namespace Model;
use app\core\Model;

class Customer extends Model {
	protected $table = "customers";
    protected $fillable = [''];
    protected $primaryKey = 'customer_id';
}

