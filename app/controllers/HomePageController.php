<?php

/**
* 
*/
class HomePageController
{
	public $_data = [];
	
	public function __construct()
	{
		$category = Category::all();
		$posts = Post::get_feature_post();
		$cate_post = CategoryPost::all();
		$best_seller = Product::get_best_seller();
		$this->_data['category'] = $category;
		$this->_data['feature_post'] = $posts;
		$this->_data['cat_post'] = $cate_post;
		$this->_data['best_seller'] = $best_seller;
	}

	public function index(){
		$title = 'Văn phòng phẩm -  TMDT';
		$this->_data['title'] = $title;
		if(!empty($this->_data['category'])):
			$list_by_cat = [];
			$i = 0;
			foreach($this->_data['category'] as $cate):
				if($cate->cat_parent == 0):
					$list_by_cat[$i]['cat_name'] = $cate->name;
					$list_by_cat[$i]['slug_cat'] = $cate->slug;
					$acv_post = Product::get_by_category_parent($cate->id);
					$list_by_cat[$i]['list_post'] = $acv_post;
					$i ++;
				endif;
			endforeach;
			$this->_data['list_by_cat'] = $list_by_cat;
		endif;

		$sliders = Options::get_by_key('slide');

		$this->_data['slider'] = $sliders->value;

		$view = new View('index',$this->_data);
		$view->render();
	}


	public function cart()
	{	
		
		if($_SERVER['REQUEST_METHOD'] == "POST")
		{
			$lisss = $_POST['list_sp'];
			$lisss = str_replace("'",'"',$lisss);
			$lisas = json_decode($lisss);
			$code = time();
			ob_start(); ?>
		<h1>Danh sách đơn hàng</h1>
		<h3>Mã đơn hàng : <?php echo $code; ?></h3>
		<table style="width: 100%; text-align: center;" border="1">
			<thead>
				<tr>
					<th>STT</th>
					<th>Tên sản phẩm</th>
					<th>Số lượng</th>
					<th>Đơn giá</th>
					<th>Tổng cộng</th>
				</tr>
			</thead>
			<tbody>
		<?php
			$list_sp = [];
			if(!empty($lisas)):
				$total = 0;
				foreach($lisas as $key => $pro):
					$list_sp[] = array(
						'id' => $pro->id,
						'sl' => $pro->sl,
					);
					$total += get_price($pro->id)*$pro->sl; ?>
				<tr>
					<td><?= $key+1; ?></td>
					<td><?= get_the_title($pro->id); ?></td>
					<td><?= $pro->sl; ?></td>
					<td><?= number_format(get_price($pro->id)).' VND'; ?></td>
					<td><?= number_format(intval(get_price($pro->id))*$pro->sl).' VND'; ?></td>
				</tr>
			<?php
				endforeach;
				$list_sp = json_encode($list_sp);
			endif; ?>
			</tbody>
			<tfoot>
				<tr>
					<td colspan="4" style="text-align: center;"><b>Tổng đơn hàng</b></td>
					<td><b style="color: orange;"><?php echo number_format($total).' VND'; ?></b></td>
				</tr>
			</tfoot>
		</table>
			<?php

			$hoten = $_POST['hoten'];
			$phone = $_POST['phone'];
			$email = $_POST['email'];
			$address = $_POST['address'];
			?>
			<div class="info_useer">
				<h2>Thông tin giao hàng</h2>
				<p>Họ tên : <b><?php echo $hoten; ?></b></p>
				<p>Số điện thoại : <b><?php echo $phone; ?></b></p>
				<p>Email : <b><?php echo $email; ?></b></p>
				<p>Địa chỉ : <b><?php echo $address; ?></b></p>
			</div>
			<div class="thank">
				<p>Cảm ơn bạn đã đặt hàng tại Website của chúng tôi. Thanks</p>
			</div>
			<?php
			$content = ob_get_contents();
			ob_end_clean();

			$subject = "Thông báo đơn hàng";

			$check = Cart::insert_cart($code,$list_sp,$hoten,$phone,$email,$address,$total);
			if($check > 0)
			{
				unset($_SESSION['list_pro']);
				send_mail($email,$hoten,$subject,$content);
				
			}
		}


		$list = [];
		if(isset($_SESSION['list_pro']) && !empty($_SESSION['list_pro'])):
			foreach($_SESSION['list_pro'] as $key => $list_pro):
				$pro = Product::get_by_id($list_pro['id']);
				$list[$key]['product'] = $pro;
				$list[$key]['quantity'] = $list_pro['sl'];
			endforeach;

		endif;
		if(isset($_SESSION['user_login']['id'])):
			$user = Users::getbyid($_SESSION['user_login']['id']);
			if(!empty($user)) $this->_data['user_cart'] = $user;
		endif;
		$this->_data['list_pro'] = $list;
		$this->_data['title'] = "Giỏ hàng";
		$view = new View('cart',$this->_data);
		$view->render();
	}

	public function list_dh($id = null)
	{
		if(!empty($id)) 
		{
			$this->_data['single_dh'] = Cart::get_dh_by_id($id);
			$this->_data['title'] = "Đơn hàng ".$id;
			$view = new View('single_dh',$this->_data);
			$view->render();
		}
		else
		{
			$this->_data['list_dh'] = Cart::get_dh();
			$this->_data['title'] = "Danh sách đơn hàng";
			$view = new View('list_dh',$this->_data);
			$view->render();
		}
		
	}

	public function search()
	{
		$key = isset($_GET['s'])?$_GET['s']:'';
		$list_product = Product::search($key);
		$this->_data['list_product'] = $list_product;
		$this->_data['title'] = "Kết quả tìm kiếm cho ".$key;
		$view = new View('search',$this->_data);
		$view->render();

	}


	public function thankyou()
	{
		$this->_data['title'] = "Cảm ơn";
		$view = new View('thankyou',$this->_data);
		$view->render();

	}

	

}