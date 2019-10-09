<?php 

class Users {

	public function __construct()
	{

	}


	public static function get_all()
	{
		$connection = Database::GetInstance();
		$sql = "select * from users";
		$users = $connection->query($sql,PDO::FETCH_CLASS,__CLASS__)->fetchAll();
		return $users;
	}

	public static function getbyusername($username)
	{
		$connection = Database::GetInstance();
		$sql = "select * from users where status = 1 and username = '$username'";
		$user = $connection->query($sql,PDO::FETCH_CLASS,__CLASS__)->fetch();
		return $user;
	}

	public static function getbyemail($email)
	{
		$connection = Database::GetInstance();
		$sql = "select * from users where status = 1 and email = '$email'";
		$user = $connection->query($sql,PDO::FETCH_CLASS,__CLASS__)->fetch();
		return $user;
	}

	public static function getbyid($id)
	{
		$connection = Database::GetInstance();
		$sql = "select * from users where status = 1 and id = '$id'";
		$user = $connection->query($sql,PDO::FETCH_CLASS,__CLASS__)->fetch();
		return $user;
	}

	public static function update($id, $fullname, $email , $phone, $address , $password = null)
	{
		$connection = Database::GetInstance();
		$sql = "UPDATE users set fullname = '$fullname', email = '$email', phone = '$phone', address = '$address'";
		if(!empty($password)) $sql .= "password = $pasword";
		$sql .= " where id = '$id'";
		$user = $connection->exec($sql);
		return $user;
	}

	public static function update_admin($id, $fullname, $email , $phone, $address , $password, $role)
	{
		$connection = Database::GetInstance();
		$sql = "UPDATE users set fullname = '$fullname', email = '$email', phone = '$phone', address = '$address' , role='$role', updated_at = sysdate()";
		if(!empty($password)) $sql .= ", password='$password'";
		$sql.= " where id = '$id'";
		$user = $connection->exec($sql);
		return $user;
	}

	public static function insert($username,$password,$fullname,$email,$phone,$address,$role)
	{
		$connection = Database::GetInstance();
		$sql = "INSERT INTO  users(username,password,fullname,email,phone,address,role,status,created_at) values ('$username','$password','$fullname','$email','$phone','$address','$role',1,sysdate())";
		$user = $connection->exec($sql);
		return $user;
	}

	public static function delete($id)
	{
		$connection = Database::GetInstance();
		$sql = "DELETE from users where id='$id'";
		$user = $connection->exec($sql);
		return $user;
	}
}


 ?>