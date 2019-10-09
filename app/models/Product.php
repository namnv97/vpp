<?php 

class Product
{

	private $product;



	public static function all()
	{
		$connection = Database::GetInstance();
		$sql = "select * from product where status=1 order by best_seller desc,created_at desc";
		$product = $connection->query($sql,PDO::FETCH_CLASS,__CLASS__)->fetchAll();
		return $product;
	}


	public static function get_product($slug)
	{
		$connection = Database::GetInstance();
		$sql = "select * from product where slug = '$slug' and status=1";
		$product = $connection->query($sql,PDO::FETCH_CLASS,__CLASS__)->fetch();
		return $product;
	}

	public static function get_by_category($array,$offset = 1)
	{
		$connection = Database::GetInstance();
		$sql = "select * from product where cat_id in $array and status=1";
		if($offset > 1)
		{
			$offset = ($offset-1)*6;
			$sql .= " limit $offset,6";

			// echo $sql; die();
		}
		else $sql .= " limit 6";

		$product = $connection->query($sql,PDO::FETCH_CLASS,__CLASS__)->fetchAll();
		return $product;
	}

	public static function get_best_seller()
	{
		$connection = Database::GetInstance();
		$sql = "select * from product where status=1 and best_seller = 1 order by rand() limit 4";
		$product = $connection->query($sql,PDO::FETCH_CLASS,__CLASS__)->fetchAll();
		return $product;
	}

	public static function get_by_category_parent($cat_id,$offset=1)
	{
		$connection = Database::GetInstance();
		$sql = "select pro.* from categories as cat INNER JOIN product as pro ON cat.id = pro.cat_id and (cat.id = $cat_id or cat.cat_parent = $cat_id) order by cat.id asc";
		if($offset > 1)
		{
			$offset = ($offset-1)*8;
			$sql .= " limit $offset,8";
		}
		else $sql .= " limit 8";
		$product = $connection->query($sql,PDO::FETCH_CLASS,__CLASS__)->fetchAll();
		return $product;
	}

	public static function get_relate($cat_id, $id)
	{
		$connection = Database::GetInstance();
		$sql = "select * from product where status=1 and cat_id = $cat_id and id <> $id limit 4";
		$product = $connection->query($sql,PDO::FETCH_CLASS,__CLASS__)->fetchAll();
		return $product;
	}


	public static function get_by_id($id)
	{
		$connection = Database::GetInstance();
		$sql = "select * from product where status=1 and id = '$id'";
		$product = $connection->query($sql,PDO::FETCH_CLASS,__CLASS__)->fetch();
		return $product;
	}

	public static function get_price_by_id($id)
	{
		$connection = Database::GetInstance();
		$sql = "select id,name,price from product where status=1 and id = '$id'";
		$product = $connection->query($sql,PDO::FETCH_CLASS,__CLASS__)->fetch();
		return $product;
	}

	public static function get_sale_price_by_id($id)
	{
		$connection = Database::GetInstance();
		$sql = "select id,sale from product where status=1 and id = '$id'";
		$product = $connection->query($sql,PDO::FETCH_CLASS,__CLASS__)->fetch();
		return $product;
	}


	public static function insert($name,$slug,$price,$sale,$desc,$content,$cat_id,$path)
	{
		$connection = Database::GetInstance();
		$time = date('Y-m-d H:i:s');
		$sql = "INSERT INTO product(name,slug,price,sale,description,content,cat_id,thumbnail,status,created_at) values ('$name','$slug','$price','$sale','$desc','$content','$cat_id','$path',1,'$time')";
		$product = $connection->exec($sql);
		return $product;
	}

	public static function update($id,$name,$slug,$price,$sale,$desc,$content,$cat_id,$path)
	{
		$connection = Database::GetInstance();
		$time = date('Y-m-d H:i:s');
		$sql = "UPDATE product set name='$name',slug='$slug',price='$price',sale='$sale',description ='$desc',content='$content',cat_id='$cat_id',thumbnail='$path',updated_at='$time' where id='$id'";
		$product = $connection->exec($sql);
		return $product;
	}


	public static function delete($id)
	{
		$connection = Database::GetInstance();
		$sql = "DELETE from product where id= '$id'";
		$connection->exec($sql);
	}


	public static function search($key)
	{
		$connection = Database::GetInstance();
		$sql = "select * from product where status=1 and name like '%$key%' order by created_at desc";
		$product = $connection->query($sql,PDO::FETCH_CLASS,__CLASS__)->fetchAll();
		return $product;
	}

	public static function best_seller($id, $stt)
	{
		$connection = Database::GetInstance();
		$sql = "Update product set best_seller = '$stt' where id = '$id'";
		$result = $connection->exec($sql);
		return $result;
	}


	public static function getCategory($pid)
	{
		$connection = Database::GetInstance();
		$sql = "SELECT product.id as pid,product.price as price,categories.id as cid,categories.name as cname FROM product LEFT JOIN categories ON product.cat_id = categories.id WHERE product.id=$pid";
		$product = $connection->query($sql,PDO::FETCH_CLASS,__CLASS__)->fetch();
		return $product;
	}

}

 ?>