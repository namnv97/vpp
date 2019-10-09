<?php 

class Category
{
	public function __construct()
	{
		
	}

	public static function all()
	{
		$connection = Database::GetInstance();
		$sql = "select * from categories";
		$category = $connection->query($sql,PDO::FETCH_CLASS,__CLASS__)->fetchAll();
		return $category;
	}

	public static function get_all_parent()
	{
		$connection = Database::GetInstance();
		$sql = "select * from categories where cat_parent = 0";
		$category = $connection->query($sql,PDO::FETCH_CLASS,__CLASS__)->fetchAll();
		return $category;
	}

	public static function get_child($cat_id)
	{
		$connection = Database::GetInstance();
		$sql = "select id from categories where id = $cat_id or cat_parent = $cat_id";
		$category = $connection->query($sql,PDO::FETCH_CLASS,__CLASS__)->fetchAll();
		return $category;
	}

	public static function get_category($slug)
	{
		$connection = Database::GetInstance();
		$sql = "select * from categories where slug= '$slug'";
		$category = $connection->query($sql,PDO::FETCH_CLASS,__CLASS__)->fetch();
		return $category;
	}

	public static function get_by_id($id)
	{
		$connection = Database::GetInstance();
		$sql = "select * from categories where id = $id";
		$category = $connection->query($sql,PDO::FETCH_CLASS,__CLASS__)->fetch();
		return $category;
	}

	public static function insert($name,$slug,$cat_parent)
	{
		$connection = Database::GetInstance();
		$sql = "INSERT INTO categories(name,slug,cat_parent) values ('$name','$slug','$cat_parent')";
		$category = $connection->exec($sql);
		return $category;
	}

	public static function update($id,$name,$slug,$cat_parent)
	{
		$connection = Database::GetInstance();
		$sql = "Update categories set name='$name',slug='$slug',cat_parent='$cat_parent' where id='$id'";
		$category = $connection->exec($sql);
		return $category;
	}

	public static function delete($id)
	{
		$connection = Database::GetInstance();
		$sql = "DELETE FROM categories where id='$id'";
		$category = $connection->exec($sql);
		return $category;
	}



}