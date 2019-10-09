<?php 

class Ajax
{


	public function __construct()
	{

	}

	public function index()
	{

	}

	public function AddSession()
	{
		$id = $_POST['id'];
		$sl = $_POST['sl'];
		if(!isset($_SESSION['list_pro']) || empty($_SESSION['list_pro'])):
			$_SESSION['list_pro'][] = array('id' => $id, 'sl' => $sl);
			echo '1';
		else:
			if(!empty($_SESSION['list_pro'])):
				$check = 1;
				foreach($_SESSION['list_pro'] as $proid):
					if($proid['id'] == $id)
					{
						$check = 0;
						break;
					}
				endforeach;
				if($check == 1)
				{
					$_SESSION['list_pro'][] = array('id' => $id, 'sl' => $sl);
					echo '1';
				}
				else echo '0';
			endif;
		endif;
	}


	public function DeleteProduct()
	{
		$id = $_POST['id'];
		if(!isset($_SESSION['list_pro'])) return 0;
		else
		{
			$list_pro = $_SESSION['list_pro'];
			if(!empty($list_pro))
			{
				foreach($list_pro as $key => $product)
				{
					if($product['id'] == $id)
					{
						unset($_SESSION['list_pro'][$key]);
						echo '1';
						break;
					}
				}
			}
			if(empty($_SESSION['list_pro'])) echo '1';
		}
		
	}

	public function UpdateCart()
	{
		$id = $_POST['id'];
		$sl = $_POST['sl'];

		if(!isset($_SESSION['list_pro'])) echo '0';
		else {
			if(!empty($_SESSION['list_pro']))
			{
				foreach($_SESSION['list_pro'] as $key => $value)
				{
					if($value['id'] == $id)
					{
						$_SESSION['list_pro'][$key]['sl'] = $sl;
						echo '1';
					}
				}
			}
		}
	}

	public function check_username()
	{
		$username = $_POST['username'];

		$check = Users::getbyusername($username);
		if(!empty($check)) echo '0';
		else echo '1';
	}

	public function check_email()
	{
		$email = $_POST['email'];

		$check = Users::getbyemail($email);
		if(!empty($check)) echo '0';
		else echo '1';
	}


	public function get_more()
	{
		ob_start();
		$arr = $_POST['arr'];
		$offset = $_POST['offset'];


		$list_product = Product::get_by_category($arr,$offset);

		if(!empty($list_product)): ?>

			<?php
			foreach($list_product as $product):
				?>
				<div class="col-xs-12 col-sm-12 col-md-4 col-lg-4 item_cate">
					<div class="box-item">
						<div class="box-img">
							<a href="<?php echo URL_PRODUCT.$product->slug; ?>">
								<img src="<?php echo base_url.$product->thumbnail; ?>" alt="product" width="100%" />
							</a>
						</div>
						<div class="box-text">
							<h3 class="title text-center">
								<a href="<?php echo URL_PRODUCT.$product->slug; ?>">
									<?php echo $product->name ?>
								</a>						 				
							</h3>
							<p class="price text-center" data-value="<?php echo $product->price; ?>">Giá : <span><?php echo number_format($product->price); ?> VND</span></p>
							<p class="text-center">
								<!-- <button class="btn btn-sm btn-success" data-value="<?php //echo $product->id; ?>">Mua ngay</button> -->
								<button class="btn btn-sm btn-danger btn-add" data-value="<?php echo $product->id; ?>">Thêm vào giỏ</button>
							</p>
						</div>
					</div>
				</div>
			<?php endforeach; ?>
				<?php if(count($list_product) == 6 ): ?>
				<div class="text-center vhn">
					<button class="btn btn-md btn-primary showmore" data-num="<?php echo $offset+1; ?>" data-id="<?php echo $arr; ?>">Xem thêm <img src="../img/loading.gif" alt="" width="30" class="hidden"></button>
				</div>
				<?php endif; ?>
		<?php endif;

		$content = ob_get_contents();

		ob_end_clean();
		echo $content;
		
		die();
	}

	public function get_post()
	{
		ob_start();
		$page = $_POST['page'];
		$list_post = Post::get_all(6,$page);
		if(!empty($list_post)):
			?>
			<div class="row categorypost">
			<?php foreach($list_post as $post): ?>
				<div class="col-xs-12 col-sm-12 col-md-4 col-lg-4">
					<div class="box-item">
						<div class="box-img">
							<a href="<?php echo URL_POST.$post->slug; ?>">
								<img src="<?php echo base_url.$post->thubnails; ?>" alt="<?php echo $post->title; ?>"></a>
							</div>
							<div class="box-text">
								<h4>
									<a href="<?php echo URL_POST.$post->slug; ?>"><?php echo $post->title; ?></a>
								</h4>
								<div class="excerpt">
									<?php echo trim_word_cus($post->description,30); ?>
								</div>
							</div>
						</div>
					</div>
				<?php endforeach; ?>
				</div>
	<?php
		endif;
		$content = ob_get_contents();
		ob_end_clean();
		echo $content;
		die();
	}

	public function best_seller()
	{
		$id = $_POST['id'];
		$stt = $_POST['stt'];

		$ck = Product::best_seller($id,$stt);

		if($ck > 0) echo '1';
		else echo '0';
		die();
	}

	// Thong ke
	public function tk_get_data()
	{
		$data = array(
			"month"=>$_POST['month'],
			"year"=>$_POST['year'],
		);

		$orders = Cart::get_dh_by_datetime($data['month'],$data['year']);

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
		echo json_encode($data);
		die();
	}
}


 ?>