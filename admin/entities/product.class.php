<?php
$filepath = realpath(dirname(__FILE__));
require_once($filepath . "/../configs/db.class.php");

class Product
{
	public $item_id;
	public $item_name;
	public $item_brand;
	public $item_price;
	public $item_image;
	public $item_register;

	public function __construct($item_name, $item_brand, $item_price, $item_image, $item_register)
	{
		$this->name = $item_name;
		$this->description = $item_brand;
		$this->price = $item_price;
		$this->image = $item_image;
		$this->idCategory = $item_register;
	}

	public static function getProducts()
	{
		$db = new Db();

		$sql = "SELECT * FROM `product` ";
		$result = $db->select_to_array($sql);
		return $result;
	}

	public static function getProductById($id)
	{
		$db = new Db();
		$sql = "SELECT * FROM `product` WHERE item_id = $id";
		$result = $db->select_to_array($sql);
		return $result;
	}

	public function addProduct()
	{
		$db = new Db();
		$sql = "INSERT INTO `product` (item_name, item_brand, item_price, item_image) VALUES 
		('$this->item_name', '$this->item_brand', '$this->item_price', '$this->item_image')";

		$result = $db->query_execute($sql);
		return $result;
	}

	public function updateProduct($id)
	{
		$db = new Db();
		$sql = "UPDATE `product` 
		SET item_name='$this->item_name', 
		item_brand='$this->item_brand', 
		item_price='$this->item_price', 
		item_image='$this->item_image', 
		item_register= '$this->item_register', 
			idBrand= '$this->idBrand' 

		WHERE item_id = $id";

		$result = $db->query_execute($sql);
		return $result;
	}

	public static function deleteProduct($id)
	{
		$db = new Db();
		$sql = "DELETE FROM `product` WHERE item_id = $id";
		$result = $db->query_execute($sql);
		return $result;
	}
}
