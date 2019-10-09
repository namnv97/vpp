<?php 

class Cart
{
	public $table = 'cart';

	public function __construct()
	{

	}

	public static function insert_cart($code,$list_pro, $ten_kh, $phone_kh, $email_kh, $address_kh,$total)
	{
		$connection = Database::GetInstance();
		$time = date("Y-m-d H:i:s");
		$sql = "INSERT INTO cart(code,list_product,ten_kh,phone_kh,email_kh,address_kh,total,created_at) values ('$code','$list_pro','$ten_kh','$phone_kh','$email_kh','$address_kh','$total','$time')";
		$product = $connection->exec($sql);
		return $product;
	}

	public static function get_dh()
	{
		$connection = Database::GetInstance();
		$sql = "select * from cart order by created_at desc";
		$cart = $connection->query($sql,PDO::FETCH_CLASS,__CLASS__)->fetchAll();
		return $cart;
	}

	public static function get_dh_by_id($id)
	{
		$connection = Database::GetInstance();
		$sql = "select * from cart where id = $id";
		$cart = $connection->query($sql,PDO::FETCH_CLASS,__CLASS__)->fetch();
		return $cart;
	}

	public static function get_by_email($email)
	{
		$connection = Database::GetInstance();
		$sql = "select * from cart where email_kh = '$email' order by created_at desc";
		$cart = $connection->query($sql,PDO::FETCH_CLASS,__CLASS__)->fetchAll();
		return $cart;
	}


	public static function get_dh_code($code)
	{
		$connection = Database::GetInstance();
		$sql = "select * from cart where code = '$code'";
		$cart = $connection->query($sql,PDO::FETCH_CLASS,__CLASS__)->fetch();
		return $cart;
	}

	public static function update_cart_ad($code,$hoten,$email,$phone,$address,$status)
	{
		$connection = Database::GetInstance();
		$sql = "UPDATE cart set ten_kh = '$hoten', phone_kh = '$phone', email_kh = '$email', address_kh ='$address', status = '$status' where code = '$code'";
		$result = $connection->exec($sql);
		return $result;
	}

	public static function get_dh_by_datetime($month,$year)
	{
		$connection = Database::GetInstance();
		$sql = "SELECT * from cart where MONTH(created_at) = $month AND YEAR(created_at) = $year";
		$cart = $connection->query($sql,PDO::FETCH_CLASS,__CLASS__)->fetchAll();
		return $cart;
	}
}


 ?>