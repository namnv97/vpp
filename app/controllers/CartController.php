<?php 

class CartController
{
	public $_data = [];

	public function __construct()
	{
		$category = Category::all();
		$posts = Post::get_feature_post();
		$cate_post = CategoryPost::all();
		$this->_data['category'] = $category;
		$this->_data['feature_post'] = $posts;
		$this->_data['cat_post'] = $cate_post;
	}

	public function don_hang($id=null)
	{
		$user_id = $_SESSION['user_login']['id'];
		$user = Users::getbyid($user_id);
		$email = $user->email;
		if(!empty($id))
		{
			$cart = Cart::get_dh_by_id($id);
			$this->_data['cart'] = $cart;
			$list = $cart->list_product;
			$list = json_decode($list,true);
			$list_pro = [];
			if(!empty($list))
			{
				$i = 0;
				foreach($list as $li)
				{
					$pro = Product::get_by_id($li['id']);
					$list_pro[$i] = array('product' => $pro, 'sl'=>$li['sl']);
					$i ++;
				}
			}
			$this->_data['list_pro'] = $list_pro;
			$this->_data['title'] = "Đơn hàng ".$cart->code;
			$view = new View('invoice_single',$this->_data);
			$view->render();
		}
		else
		{
			$list_cart = Cart::get_by_email($email);
			// echo '<pre>';
			// var_dump($list_cart);
			// echo '</pre>';
			$this->_data['list_cart'] = $list_cart;
			$this->_data['title'] = "Danh sách đơn hàng";
			$view = new View('invoice',$this->_data);
			$view->render();
		}
	}




}


 ?>