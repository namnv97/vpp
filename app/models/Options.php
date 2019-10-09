<?php 

class Options
{
	public function __construct()
	{

	}

	public static function all()
	{
		$connection = Database::GetInstance();
		$sql = "select * from options";
		$options = $connection->query($sql,PDO::FETCH_CLASS,__CLASS__)->fetchAll();
		return $options;
	}

	public static function get_by_key($key)
	{
		$connection = Database::GetInstance();
		$sql = "select * from options where keyy = '$key'";
		$option = $connection->query($sql,PDO::FETCH_CLASS,__CLASS__)->fetch();
		return $option;
	}

	public function insert($key,$value)
	{
		$connection = Database::GetInstance();
		$sql = "INSERT INTO options(keyy,value) values('$key','$value')";
		$option = $connection->exec($sql);
		return $option;
	}

	public static function update($key,$value)
	{
		$connection = Database::GetInstance();
		$sql = "UPDATE options set value='$value' where keyy='$key'";
		$option = $connection->exec($sql);
		return $option;
	}

	public static function delete($key)
	{
		$connection = Database::GetInstance();
		$sql = "DELETE from options where keyy='$key'";
		$option = $connection->exec($sql);
		return $option;
	}
}


 ?>