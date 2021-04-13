<?php
$filepath = realpath(dirname(__FILE__));
require_once($filepath . "/../configs/db.class.php");

class Category
{
	public $id;
	public $name;

	public function __construct($name)
	{
		$this->name = $name;
	}

	public static function getCategories()
	{
		$db = new Db();

		$sql = "SELECT * FROM `categories` ";
		$result = $db->select_to_array($sql);
		return $result;
	}

	public static function getCategoryById($id)
	{
		$db = new Db();
		$sql = "SELECT * FROM `categories` WHERE id = $id";
		$result = $db->select_to_array($sql);
		return $result;
	}

	public function addCategory()
	{
		$db = new Db();
		$sql = "INSERT INTO `categories` (name) VALUES ('$this->name')";

		$result = $db->query_execute($sql);
		return $result;
	}

	public function updateCategory($id)
	{
		$db = new Db();
		$sql = "UPDATE `categories` SET name='$this->name' WHERE id = $id";

		$result = $db->query_execute($sql);
		return $result;
	}

	public static function deleteCategory($id)
	{
		$db = new Db();
		$sql = "DELETE FROM `categories` WHERE id = $id";
		$result = $db->query_execute($sql);
		return $result;
	}
}
