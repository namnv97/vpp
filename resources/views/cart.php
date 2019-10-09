<?php require view_cus.'header.php'; ?>

<main>
	<div class="container">
		<div class="row">
			<div class="col-xs-6 col-sm-6 col-md-6 col-lg-6">
				<h2><span>Giỏ hàng</span></h2>
				<hr>
				<?php if(!empty($list_pro)): ?> 
				<div class="list_pro">
					<?php $total = 0; ?>
				<?php foreach($list_pro as $product): ?>
					<?php $total += intval(get_price($product['product']->id)) * intval($product['quantity']); ?>
				<div class="item">
					<div class="item-img">
						<img src="<?php echo base_url.$product['product']->thumbnail; ?>" alt="">
					</div>
					<div class="item-text">
						<h4><a href="<?php echo URL_PRODUCT.$product['product']->slug; ?>"><?php echo $product['product']->name; ?></a></h4>
						<p class="price">Giá : <span data-price="<?php echo $product['product']->price; ?>"><?php echo number_format($product['product']->price); ?> VND</span></p>
						<div class="quantity">
							<button class="btn btn-down">-</button>
							<input type="text" value="<?php echo $product['quantity']; ?>" class="numcus form-control" data-id="<?php echo $product['product']->id; ?>" min="1">
							<button class="btn btn-up">+</button>
						</div>
						<p class="single_total">
							Tổng cộng: <span><?php echo number_format($product['product']->price*$product['quantity']); ?> VND</span>
						</p>
						<i class="fa fa-trash" title="Xóa sản phẩm" data-delete="<?php echo $product['product']->id; ?>"></i>
					</div>
				</div>
				<hr>
				<?php endforeach; ?>
				</div>
				<?php else: ?>
					<div class="alert alert-success">Bạn chưa thêm sản phẩm nào vào giỏ hàng</div>
					<p class="text-center">
						<a href="<?php echo base_url; ?>" class="btn btn-md btn-primary">Quay về trang chủ</a>
					</p>
				<?php endif; ?>
			</div>
			<div class="col-xs-6 col-sm-6 col-md-6 col-lg-6">
				<h2><span>Thông tin mua hàng</span></h2>
				<hr>
				<form action="" method="post" id="form_dat_hang">
					<div class="form_info">
						<div class="form-group">
							<label for="name">Họ tên</label>
							<input type="text" name="hoten" class="form-control" placeholder="Họ tên" value="<?php echo (isset($user_cart))?$user_cart->fullname:FALSE; ?>">
						</div>
						<div class="form-group">
							<label for="phone">Số điện thoại</label>
							<input type="text" name="phone" class="form-control" placeholder="Số điện thoại" value="<?php echo (isset($user_cart))?$user_cart->phone:FALSE; ?>">
						</div>
						<div class="form-group">
							<label for="email">Email</label>
							<input type="email" name="email" class="form-control" placeholder="Email" value="<?php echo (isset($user_cart))?$user_cart->email:FALSE; ?>">
						</div>
						<div class="form-group">
							<label for="address">Địa chỉ</label>
							<textarea name="address" class="form-control" rows="5" placeholder="Địa chỉ" value="<?php echo (isset($user_cart))?$user_cart->address:FALSE; ?>"></textarea>
						</div>
						<div class="form-group">
							<label>Hình thức giao hàng</label>
							<div class="list" style="background: #eee; padding-left: 15px;">
								<label for="visa"><input type="radio" name="pay" id="visa"> Thanh toán qua Visa</label>
								<br/>
								<label for="atm"><input type="radio" name="pay" id="atm"> Thanh toán qua ngân hàng</label>
								<br/>
								<label for="cod"><input type="radio" name="pay" id="cod"> Thanh toán khi nhận hàng</label>
							</div>
							<div class="info">
								<div class="visa">
									<div class="form-group">
										<label>Mã số thẻ</label>
										<input type="text" name="mst" class="form-control" placeholder="Mã số thẻ">
									</div>
									<div class="form-group">
										<label>Tên chủ thẻ</label>
										<input type="text" name="tct" class="form-control" placeholder="Tên chủ thẻ">
									</div>
									<div class="form-group row">
										<div class="col-xs-6 col-sm-6 col-md-6 col-lg-6">
											<label>Ngày hết hạn</label>
											<input type="date" name="nhh" id="nhh" class="form-control">
										</div>
										<div class="col-xs-6 col-sm-6 col-md-6 col-lg-6">
											<label>CVV</label>
											<input type="text" name="cvv" placeholder="Mã CVV" class="form-control">
										</div>
									</div>
								</div>
								<div class="atm">
									<h3><b>Thanh toán cho chúng tôi theo các tài khoản ngân hàng:</b></h3>
									<ul>
										<li>Vietcombank : 0235461564</li>
										<li>Viettinbak : 0235461564</li>
										<li>BIDV : 0235461564</li>
										<li>Techcombank : 0235461564</li>
										<li>Agribank : 0235461564</li>
									</ul>
								</div>
							</div>
						</div>
					</div>
					<hr>
					<div class="total" style="display: flex;align-items: center;">
						<span class="text-left" style="display: inline-block;width: 50%">Tổng cộng</span>
						<span class="text-right" id="total" style="display: inline-block;width: 50%"><?php echo (isset($total))?number_format($total):'0'; ?> VND</span>
					</div>
					<div class="text-center">
						<input type="hidden" name="total" value="">
						<button class="btn btn-primary form-control" id="dh_cart">Đặt hàng</button>
					</div>
				</form>
			</div>
		</div>
	</div>
</main>

<?php require view_cus.'footer.php'; ?>