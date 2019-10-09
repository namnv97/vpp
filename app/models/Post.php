<?php 

class Post
{
	public function __construct()
	{

	}

	public static function all()
	{
		$connection = Database::GetInstance();
		$sql = "select * from post order by created_at desc";
		$posts = $connection->query($sql,PDO::FETCH_CLASS,__CLASS__)->fetchAll();
		return $posts;
	}

	public static function get_all($per_page=0,$offset=1)
	{
		$connection = Database::GetInstance();
		$sql = "select * from post where status=1 order by created_at desc";
		if($per_page > 0)
		{
			$sql .= " limit ";
			$offset = ($offset - 1)*$per_page;
			if($offset > 0) $sql .= $offset.',';
			$sql .= $per_page;
		}
		$posts = $connection->query($sql,PDO::FETCH_CLASS,__CLASS__)->fetchAll();
		return $posts;
	}


	public static function get_feature_post()
	{
		$connection = Database::GetInstance();
		$sql = "select * from post where status = 1 order by view desc limit 4";
		$posts = $connection->query($sql,PDO::FETCH_CLASS,__CLASS__)->fetchAll();
		return $posts;
	}

	public static function get_post($slug)
	{
		$connection = Database::GetInstance();
		$sql = "select * from post where slug='$slug' and status=1";
		$post = $connection->query($sql,PDO::FETCH_CLASS,__CLASS__)->fetch();
		return $post;
	}

	public static function get_by_id($id)
	{
		$connection = Database::GetInstance();
		$sql = "select * from post where id='$id' and status=1";
		$post = $connection->query($sql,PDO::FETCH_CLASS,__CLASS__)->fetch();
		return $post;
	}

	public static function insert($title,$description,$content,$thumb,$stt)
	{
		$connection = Database::GetInstance();
		$time = date('Y-m-d H:i:s');
		$slug = create_code($title).'-'.time();
		$sql = "INSERT INTO post(title,slug,description,content,thubnails,status,created_at) values ('$title','$slug','$description','$content','$thumb','$stt','$time')";
		$post = $connection->exec($sql);
		return $post;
	}

	public static function update($id,$title,$description,$content,$stt)
	{
		$connection = Database::GetInstance();
		$sql = "UPDATE post set title='$title', description='$description',content='$content',status='$stt' where id='$id'";
		$post = $connection->exec($sql);
		return $post;
	}

	public static function update_thum($id,$url)
	{
		$connection = Database::GetInstance();
		$sql = "UPDATE post set thubnails='$url' where id='$id'";
		$post = $connection->exec($sql);
		return $post;
	}

	public static function post_trash()
	{
		$connection = Database::GetInstance();
		$sql = "select * from post where status=0";
		$post = $connection->query($sql,PDO::FETCH_CLASS,__CLASS__)->fetchAll();
		return $post;
	}

	public static function restore($id)
	{
		$connection = Database::GetInstance();
		$sql = "UPDATE post set status=1 where id='$id'";
		$post = $connection->exec($sql);
		return $post;
	}


	public static function delete($id)
	{
		$connection = Database::GetInstance();
		$sql = "UPDATE post set status=0 where id='$id'";
		$post = $connection->exec($sql);
		return $post;
	}

	public static function delete_2($id)
	{
		$connection = Database::GetInstance();
		$sql = "DELETE from post where id='$id'";
		$post = $connection->exec($sql);
		return $post;
	}


	public static function setPostView($id,$view)
	{
		$connection = Database::GetInstance();
		$view = intval($view)+1;
		$sql = "UPDATE post set view='$view' where id='$id'";
		$post = $connection->exec($sql);
		return $post;
	}

	// public static function get_by_category($id)
	// {
	// 	$connection = Database::GetInstance();
	// 	$sql = "select * from post where status=1 and ";
	// 	$post = $connection->query($sql,PDO::FETCH_CLASS,__CLASS__)->fetchAll();
	// 	return $post;
	// }

	public static function get_relate_post($id)
	{
		$connection = Database::GetInstance();
		$sql = "select * from post where status = 1 and ID <> $id order by rand() limit 4";
		$posts = $connection->query($sql,PDO::FETCH_CLASS,__CLASS__)->fetchAll();
		return $posts;
	}


}

 ?>