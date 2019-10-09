<?php 

class UserController
{
	public $_data = [];

	public function __construct()
	{
		$category = Category::all();
		$cate_post = CategoryPost::all();
		$this->_data['category'] = $category;
		$this->_data['cat_post'] = $cate_post;
	}


	public function thong_tin_ca_nhan()
	{
		if(isset($_SESSION['user_login'])):
		$user = Users::getbyid($_SESSION['user_login']['id']);

		if($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['update_info']) && $_POST['update_info'] == 'update'):
			$_SESSION['user_error'] =  [];
			$fullname = $_POST['fullname'];
			$email = $_POST['email'];
			$phone = $_POST['phone'];
			$address = $_POST['address'];
			// $pass = $_POST['password'];
			// $newpass = $_POST['newpassword'];
			if(empty($fullname)) $_SESSION['user_error']['name'] = "Họ tên không được bỏ trống";
			if(empty($email)) $_SESSION['user_error']['email'] = "Email không được bỏ trống";
			else {
				preg_match('/([a-zA-Z0-9\.]+)@([a-z0-9]+)\.([a-z]{3})/',$email,$matches);
				if(count($matches) == 0) $_SESSION['user_error']['email'] = "Vui lòng kiểm tra định dạng Email";
			}
			if(empty($phone)) $_SESSION['user_error']['phone'] = "Số điện thoại không được bỏ trống";
			else
			{
				preg_match('/(09|08)([0-9]{8})/',$phone,$match);
				if(count($match) == 0) $_SESSION['user_error']['phone'] = "Vui lòng kiểm tra số điện thoại";
			}
			if(empty($address)) $_SESSION['user_error']['address'] = "Địa chỉ không được bỏ trống";


			if(empty($_SESSION['user_error']))
			{
				$check = Users::update($_SESSION['user_login']['id'],$fullname, $email , $phone, $address);
				header('location: '.base_url.'user/thong-tin-ca-nhan/'.$id);
			}
		endif;

		$this->_data['user'] = $user;
		$this->_data['title'] = "Thông tin cá nhân";
		$view = new View('auth_info',$this->_data);
		$view->render();

		else:
			header('location: '.base_url);
		endif;
	}

	

}



 ?>