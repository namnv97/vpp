<?php 

class CategoryPost{

	public function __construct()
	{

	}

	public static function all()
	{
		$connection = Database::GetInstance();
		$sql = "select * from category_post";
		$category = $connection->query($sql,PDO::FETCH_CLASS,__CLASS__)->fetchAll();
		return $category;
	}

	public static function get_all_parent()
	{
		$connection = Database::GetInstance();
		$sql = "select * from category_post where cat_parent = 0";
		$category = $connection->query($sql,PDO::FETCH_CLASS,__CLASS__)->fetchAll();
		return $category;
	}

	public static function insert($name,$slug,$cat_parent)
	{
		$connection = Database::GetInstance();
		$sql = "INSERT INTO category_post(name,slug,cat_parent) values ('$name','$slug','$cat_parent')";
		$category = $connection->exec($sql);
		return $category;
	}

	public static function get_by_id($id)
	{
		$connection = Database::GetInstance();
		$sql = "select * from category_post where id = $id";
		$category = $connection->query($sql,PDO::FETCH_CLASS,__CLASS__)->fetch();
		return $category;
	}

	public static function update($id,$name,$slug,$cat_parent)
	{
		$connection = Database::GetInstance();
		$sql = "Update category_post set name='$name',slug='$slug',cat_parent='$cat_parent' where id='$id'";
		$category = $connection->exec($sql);
		return $category;
	}

	public static function delete($id)
	{
		$connection = Database::GetInstance();
		$sql = "DELETE FROM category_post where id='$id'";
		$category = $connection->exec($sql);
		return $category;
	}

	public static function get_id_by($key,$val)
	{
		$connection = Database::GetInstance();
		$sql = "select id from category_post where $key = $val";
		$category = $connection->query($sql,PDO::FETCH_CLASS,__CLASS__)->fetch();
		return $category->id;
	}
}



 ?>