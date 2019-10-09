<?php

/**
* 
*/
class AdminController
{

	public $_data = [];

	public function __construct()
	{
		$category = Category::all();
		$cate_post = CategoryPost::all();
		$this->_data['category'] = $category;
		$this->_data['cat_post'] = $cate_post;
	}

	public function index(){
		$this->_data['title'] = "Admin dashboard";
		$this->_data['head_title'] = "Trang quản trị";
		$this->_data['product_count'] = count(Product::all());
		$this->_data['post_count'] = count(Post::get_all());
		$this->_data['user_count'] = count(Users::get_all());
		$view = new View('admin/dashboard',$this->_data);
		$view->render();
	}

	/*Danh mục bài viết (CategoryPost)*/

	public function danh_muc_bai_viet()
	{
		$this->_data['title'] = "Danh mục bài viết";
		$this->_data['head_title'] = "Danh mục bài viết";
		$view = new View('admin/category_post/index',$this->_data);
		$view->render();
	}

	public function add_category_post()
	{
		if($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['add']) && $_POST['add'] == 'add'):
			$name = $_POST['name'];
			$slug = $_POST['slug'];
			$cp = $_POST['cat_parent'];
			$error = [];
			if(empty($name)) $error['name'] = "Vui lòng nhập họ tên";
			if(empty($slug)) $error['slug'] = "Vui lòng nhập slug";
			if(empty($error))
			{
				$check = CategoryPost::insert($name,$slug,$cp);
				header('location: '.base_url.'admin/danh-muc-bai-viet');
			}
			$this->_data['error'] = $error;
			$this->_data['msg'] = array(
				'content' => 'Vui lòng kiểm tra lại',
				'type' => 'warning',
			);
		endif;
		$this->_data['title'] = "Thêm mới danh mục";
		$this->_data['head_title'] = "Thêm mới danh mục";
		$cat_parent = CategoryPost::get_all_parent();
		$this->_data['cat_parent'] = $cat_parent;
		$view = new View('admin/category_post/add',$this->_data);
		$view->render();
	}


	public function edit_cat_post($id)
	{
		$sgcat = CategoryPost::get_by_id($id);
		if(!empty($sgcat)):
			if($_SERVER['REQUEST_METHOD'] == "POST" && isset($_POST['edit']) && $_POST['edit'] == 'edit'):
				$name = $_POST['name'];
				$slug = $_POST['slug'];
				$cp = $_POST['cat_parent'];
				$error = [];
				if(empty($name)) $error['name'] = "Vui lòng nhập họ tên";
				if(empty($slug)) $error['slug'] = "Vui lòng nhập slug";
				if(empty($error))
				{
					$check = CategoryPost::update($id,$name,$slug,$cp);
					print_r($check);
					if($check == 1) {
						$msg = array(
							'content' => 'Cập nhật thành công',
							'type' => 'success',
						);
					}
					$sgcat = CategoryPost::get_by_id($id);
				}
				else {
					$msg = array(
						'content' => 'Vui lòng kiểm tra lại',
						'type' => 'warning',
					);
				}

				$this->_data['msg'] = $msg;
			endif;
		$this->_data['sgcat'] = $sgcat;
		$this->_data['title'] = "Cập nhật danh mục";
		$this->_data['head_title'] = "Cập nhật danh mục";
		$cat_parent = CategoryPost::get_all_parent();
		$this->_data['cat_parent'] = $cat_parent;
		$view = new View('admin/category_post/edit',$this->_data);
		$view->render();
		else:
			header('location: '.base_url.'admin/danh-muc-bai-viet');
		endif;
	}

	public function delete_cat_post($id)
	{
		CategoryPost::delete($id);
		header('location: '.base_url.'admin/danh-muc-bai-viet');
	}


	/*Danh mục sản phẩm (Category)*/

	public function danh_muc_san_pham()
	{
		$this->_data['title'] = "Danh mục sản phẩm";
		$this->_data['head_title'] = "Danh mục sản phẩm";
		$view = new View('admin/category_product/index',$this->_data);
		$view->render();
	}

	public function add_category()
	{
		if($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['add']) && $_POST['add'] == 'add'):
			$name = $_POST['name'];
			$slug = $_POST['slug'];
			$cp = $_POST['cat_parent'];
			$error = [];
			if(empty($name)) $error['name'] = "Vui lòng nhập tên danh mục";
			if(empty($slug)) $error['slug'] = "Vui lòng nhập slug";
			if(empty($error))
			{
				$check = Category::insert($name,$slug,$cp);
				header('location: '.base_url.'admin/danh-muc-san-pham');
			}
			$this->_data['error'] = $error;
			$this->_data['msg'] = array(
				'content' => 'Vui lòng kiểm tra lại',
				'type' => 'warning',
			);
		endif;
		$this->_data['title'] = "Thêm mới danh mục";
		$this->_data['head_title'] = "Thêm mới danh mục";
		$cat_parent = Category::get_all_parent();
		$this->_data['cat_parent'] = $cat_parent;
		$view = new View('admin/category_product/add',$this->_data);
		$view->render();
	}


	public function edit_category($id)
	{
		$sgcat = Category::get_by_id($id);
		if(!empty($sgcat)):
			if($_SERVER['REQUEST_METHOD'] == "POST" && isset($_POST['edit']) && $_POST['edit'] == 'edit'):
				$name = $_POST['name'];
				$slug = $_POST['slug'];
				$cp = $_POST['cat_parent'];
				$error = [];
				if(empty($name)) $error['name'] = "Vui lòng nhập tên danh mục";
				if(empty($slug)) $error['slug'] = "Vui lòng nhập slug";
				if(empty($error))
				{
					$check = Category::update($id,$name,$slug,$cp);
					print_r($check);
					if($check == 1) {
						$msg = array(
							'content' => 'Cập nhật thành công',
							'type' => 'success',
						);
					}
					$sgcat = Category::get_by_id($id);
				}
				else {
					$msg = array(
						'content' => 'Vui lòng kiểm tra lại',
						'type' => 'warning',
					);
				}

				$this->_data['msg'] = $msg;
			endif;
		$this->_data['sgcat'] = $sgcat;
		$this->_data['title'] = "Cập nhật danh mục";
		$this->_data['head_title'] = "Cập nhật danh mục";
		$cat_parent = Category::get_all_parent();
		$this->_data['cat_parent'] = $cat_parent;
		$view = new View('admin/category_product/edit',$this->_data);
		$view->render();
		else:
			header('location: '.base_url.'admin/danh-muc-san-pham');
		endif;
	}

	public function delete_category($id)
	{
		Category::delete($id);
		header('location: '.base_url.'admin/danh-muc-san-pham');
	}

	/*Bài viết*/

	public function danh_sach_bai_viet()
	{
		$posts = Post::get_all();
		$this->_data['posts'] = $posts;
		$this->_data['title'] = "Danh sách bài viết";
		$this->_data['title_head'] = "Danh sách bài viết";
		$view = new View('admin/post/index',$this->_data);
		$view->render();
	}

	public function them_bai_viet()
	{
		if($_SERVER['REQUEST_METHOD'] == "POST" && isset($_POST['add']) && $_POST['add'] == 'add')
		{
			$title = $_POST['title'];
			$description = $_POST['description'];
			$content = $_POST['content'];
			$thumb = $_FILES['thumnails'];
			$stt = $_POST['status'];
			$path = str_replace('/VPP/public/','',$_POST['thumnails']);
			$check = Post::insert($title,$description,$content,$path,$stt);
			if($check > 0) header('location: '.base_url.'admin/danh-sach-bai-viet');
		}
		$this->_data['title'] = "Thêm bài viết";
		$this->_data['title_head'] = "Thêm bài viết";
		$view = new View('admin/post/add',$this->_data);
		$view->render();
	}

	public function sua_bai_viet($id)
	{
		if($_SERVER['REQUEST_METHOD'] == "POST" && isset($_POST['edit']) && $_POST['edit'] == 'edit')
		{
			$title = $_POST['title'];
			$description = $_POST['description'];
			$content = $_POST['content'];
			$path = str_replace('/VPP/public/','',$_POST['thumnails']);
			$stt = $_POST['status'];
			$check = Post::update($id,$title,$description,$content,$stt);
			Post::update_thum($id,$path);
			if($check > 0) header('location: '.base_url.'admin/sua-bai-viet/'.$id);
		}
		$this->_data['title'] = "Sửa bài viết";
		$this->_data['head_title'] = "Sửa bài viết";
		$spost = Post::get_by_id($id);
		if(empty($spost)) header('location: '.base_url.'admin/danh-sach-bai-viet');
		$this->_data['post'] = $spost;
		$view = new View('admin/post/edit',$this->_data);
		$view->render();
	}

	public function trash_post()
	{
		$post = Post::post_trash();
		$this->_data['posts'] = $post;
		$this->_data['title'] = "Bài viết đã xóa";
		$view = new View('admin/post/trash',$this->_data);
		$view->render();
	}

	public function restore($id)
	{
		Post::restore($id);
		header('location: '.base_url.'admin/danh-sach-bai-viet');
	}


	public function xoa_bai_viet($id)
	{
		Post::delete($id);
		header('location: '.base_url.'admin/danh-sach-bai-viet');
	}

	public function xoa_bai_viet_2($id)
	{
		Post::delete_2($id);
		header('location: '.base_url.'admin/trash-post');
	}
	

	/*Sản phẩm*/

	public function danh_sach_san_pham()
	{
		$products = Product::all();
		$this->_data['products'] = $products;
		$this->_data['title'] = "Danh sách sản phẩm";
		$view = new View('admin/product/index',$this->_data);
		$view->render();
	}

	public function sua_san_pham($id)
	{
		if($_SERVER['REQUEST_METHOD'] == "POST" && isset($_POST['edit']) && $_POST['edit'] == 'edit'
		):
			$name = $_POST['name'];
			$slug = $_POST['slug'];
			$price = $_POST['price'];
			$sale = (empty($_POST['sale']))?'0':$_POST['sale'];
			$desc = $_POST['description'];
			$content = trim($_POST['content']);
			$cat_id = $_POST['cat_id'];
			$path = str_replace('/VPP/public/','',$_POST['thumnails']);

			Product::update($id,$name,$slug,$price,$sale,$desc,$content,$cat_id,$path);
			header('location: '.base_url.'admin/sua-san-pham/'.$id);
		endif;
		$product = Product::get_by_id($id);
		$this->_data['product'] = $product;
		$this->_data['title'] = "Cập nhật sản phẩm";
		$view = new View('admin/product/edit',$this->_data);
		$view->render();
	}

	public function them_san_pham()
	{
		if($_SERVER['REQUEST_METHOD'] == "POST" && isset($_POST['add']) && $_POST['add'] == 'add'
		):
			$name = $_POST['name'];
			$slug = $_POST['slug'];
			$price = $_POST['price'];
			$sale = (empty($_POST['sale']))?'0':$_POST['sale'];
			$desc = $_POST['description'];
			$content = trim($_POST['content']);
			$cat_id = $_POST['cat_id'];
			$path = str_replace('/VPP/public/','',$_POST['thumnails']);
			

			Product::insert($name,$slug,$price,$sale,$desc,$content,$cat_id,$path);
			header('location: '.base_url.'admin/danh-sach-san-pham');
		endif;
		$this->_data['title'] = "Thêm sản phẩm";
		$view = new View('admin/product/add',$this->_data);
		$view->render();
	}


	public function xoa_san_pham($id)
	{
		Product::delete($id);
		header('location: '.base_url.'admin/danh-sach-san-pham');
	}

	/*Users*/

	public function users()
	{
		$users = Users::get_all();
		$this->_data['users'] = $users;
		$this->_data['title'] = "Danh sách người dùng";
		$view = new View('admin/users/index',$this->_data);
		$view->render();
	}

	public function edit_user($id=null)
	{
		if(empty($id)) header('location: '.base_url.'admin/users');
		else
		{
			if($_SERVER['REQUEST_METHOD'] == "POST" && isset($_POST['edit_user']) && $_POST['edit_user'] == "edit_user"):
				$fullname = trim($_POST['fullname']);
				$email = trim($_POST['email']);
				$phone = trim($_POST['phone']);
				$address = trim($_POST['address']);
				$role = trim($_POST['role']);
				$password = isset($_POST['password'])?trim($_POST['password']):'';
				if(empty($fullname)) $_SESSION['error']['fullname'] = "Vui lòng nhập Họ tên";
				if(empty($email)) $_SESSION['error']['email'] = "Vui lòng nhập Email";
				else {
					$check = preg_match('/([a-zA-Z0-9]+)@([a-zA-Z]{3,5}).([a-zA-Z]{3,4})/',$email,$matches);
					if(empty($check)) $_SESSION['error']['email'] = "Vui lòng kiểm tra định dạng Email";
					else
					{
						$chec = Users::getbyemail($email);
						if(!empty($chec) && $chec->id != $id) $_SESSION['error']['email'] = "Email đã được sử dụng";
					}

				}
				if(empty($phone)) $_SESSION['error']['phone'] = "Vui lòng nhập Số điện thoại";
				if(empty($address)) $_SESSION['error']['address'] = "Vui lòng nhập Địa chỉ";
				if(!isset($_SESSION['error']) || empty($_SESSION['error']))
				{
					if(!empty($password)) $password = password_hash($password, PASSWORD_DEFAULT);
					$check = Users::update_admin($id,$fullname,$email,$phone,$address,$password,$role);
					if($check > 0) header('location: '.base_url.'admin/users');
				}
				$this->_data['error'] = $_SESSION['error'];
				unset($_SESSION['error']);
			endif;
			$user = Users::getbyid($id);
			$this->_data['user'] = $user;
			$this->_data['title'] = "Cập nhật thông tin người dùng";
			$view = new View('admin/users/edit',$this->_data);
			$view->render();
		}

	}

	public function add_user()
	{
		if($_SERVER['REQUEST_METHOD'] == "POST" && isset($_POST['add_user']) && $_POST['add_user'] == 'add_user'):
			$username = trim($_POST['username']);
			$password = trim($_POST['password']);
			$fullname = trim($_POST['fullname']);
			$email = trim($_POST['email']);
			$phone = trim($_POST['phone']);
			$address = trim($_POST['address']);
			$role = trim($_POST['role']);
			$_SESSION['error'] = [];
			if(empty($username)) $_SESSION['error']['username'] = "Vui lòng nhập Username";
			else {
				$check = Users::getbyusername($username);
				if(!empty($check)) $_SESSION['error']['username'] = "Username đã được sử dụng";
			}
			if(empty($password)) $_SESSION['error']['pwd'] = "Vui lòng nhập mật khẩu";

			if(empty($fullname)) $_SESSION['error']['fullname'] = "Vui lòng nhập Họ tên";
			if(empty($phone)) $_SESSION['error']['phone'] = "Vui lòng nhập Số điện thoại";
			if(empty($address)) $_SESSION['error']['address'] = "Vui lòng nhập Địa chỉ";


			if(empty($email)) $_SESSION['error']['email'] = "Vui lòng nhập Email";
			else {
				$check = preg_match('/([a-zA-Z0-9]+)@([a-zA-Z]{3,5}).([a-zA-Z]{3,4})/',$email,$matches);
				if(empty($check)) $_SESSION['error']['email'] = "Vui lòng kiểm tra định dạng Email";
				else
				{
					$chec = Users::getbyemail($email);
					if(!empty($chec)) $_SESSION['error']['email'] = "Email đã được sử dụng";
				}
				
			}
			$this->_data['error'] = $_SESSION['error'];
			if(!isset($_SESSION['error']) || empty($_SESSION['error']))
			{
				$password = PASSWORD_HASH($password,PASSWORD_DEFAULT);
				$check = Users::insert($username,$password,$fullname,$email,$phone,$address,$role);
				if($check > 0) header('location: '.base_url.'admin/users');
			}
			unset($_SESSION['error']);
		endif;
		$this->_data['title'] = "Thêm mới người dùng";
		$view = new View('admin/users/add',$this->_data);
		$view->render();
	}

	public function delete_user($id)
	{
		Users::delete($id);
		header('location: '.base_url.'admin/users');
	}

	public function quan_ly_don_hang()
	{
		$list_dh = Cart::get_dh();
		$this->_data['list_dh'] = $list_dh;
		$this->_data['title'] = "Quản lý đơn hàng";
		$view = new View('admin/cart/index',$this->_data);
		$view->render();
	}

	public function don_hang($code)
	{
		if($_SERVER['REQUEST_METHOD'] == "POST")
		{
			$hoten = $_POST['hoten'];
			$email = $_POST['email'];
			$phone = $_POST['phone'];
			$address = $_POST['address'];
			$stt = $_POST['stt'];

			$check = Cart::update_cart_ad($code,$hoten,$email,$phone,$address,$stt);
			if($check > 0) $this->_data['ok'] = "Cập nhật thành công";
		}
		$dh = Cart::get_dh_code($code);
		$this->_data['cart'] = $dh;
		$this->_data['title'] = "Cập nhật đơn hàng - ".$dh->code;
		$view = new View('admin/dh',$this->_data);
		$view->render();
	}

	// Thống kê
	public function thong_ke_doanh_thu()
	{
		$data = array(
			"month"=> date('m'),
			"year"=> date('Y'),
		);

		$orders = Cart::get_dh_by_datetime($data['month'],$data['year']);
		// echo '<pre>';
		// var_dump($orders);
		// echo '</pre>';

		$dataPoints = array();
		$sum = 0;
		$categories = array();
		foreach ($orders as $k => $v) {
			$sum += $v->total;
			$products = json_decode($v->list_product);
			foreach ($products as $k1 => $v1) {
				$cate = Product::getCategory($v1->id);
				$cost = $v1->sl * $cate->price;
				if(array_key_exists($cate->cid,$categories)){
					$categories[$cate->cid]['total'] += $cost;
				}else{
					$categories[$cate->cid] = array(
						'name'=>$cate->cname,
						'total'=>$cost
					);
				}
			}
		}

		foreach ($categories as $key => $value) {
			$dataPoints[$key] = array(
				"y"=> $value['total']*100/$sum,
				"label"=>$value['name']
			);
		}

		$data['dataPoints'] = $dataPoints;
		$data['total'] = number_format($sum,3);
		$ana = json_encode($data);
		// echo '<pre>';
		// var_dump($ana);
		// echo '</pre>';
		// die();
		$this->_data['analysis'] = $ana;
		$this->_data['title'] = "Thống kê doanh thu";
		$view = new View('admin/tkdt',$this->_data);
		$view->render();
	}

}

