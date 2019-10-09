<?php require 'header.php'; ?>

<main>
	<div class="container">
		<div class="row">
			<h3>Thông tin đơn hàng - <?php echo $cart->code; ?></h3>
			<hr>
			<div class="col-xs-12 col-sm-12 col-md-6 col-lg-6">
				<table class="table table-stripped single_dh">
					<thead>
						<th>STT</th>
						<th>Ảnh sản phẩm</th>
						<th>Tên sản phẩm</th>
						<th>Đơn giá</th>
						<th>Số lượng</th>
					</thead>
					<tbody>
						<?php 
							if(!empty($list_pro)):
								foreach($list_pro as $key => $pro):
						 ?>
						<tr>
							<td><?= $key+1; ?></td>
							<td>
								<?php 
									$link_img = $pro['product']->thumbnail;
									if(empty($link_img)) $link_img = 'img/default.PNG';
								 ?>
								<img src="<?php echo base_url.$link_img; ?>" alt="<?php echo $pro['product']->name; ?>">
							</td>
							<td><?php echo $pro['product']->name; ?></td>
							<td><?php echo number_format($pro['product']->price).' VND'; ?></td>
							<td><?php echo $pro['sl']; ?></td>
						</tr>

						<?php endforeach;endif; ?>
					</tbody>
				</table>
			</div>
			<div class="col-xs-12 col-sm-12 col-md-6 col-lg-6">
				<h3>Thông tin khách hàng</h3>
				<div class="content_kh">
					<div class="form-group">
						<label>Tên khách hàng:</label>
						<p><?php echo $cart->ten_kh; ?></p>
					</div>
					<div class="form-group">
						<label>Số điện thoại:</label>
						<p><?php echo $cart->phone_kh; ?></p>
					</div>
					<div class="form-group">
						<label>Email:</label>
						<p><?php echo $cart->email_kh; ?></p>
					</div>
					<div class="form-group">
						<label>Địa chỉ:</label>
						<p><?php echo $cart->address_kh; ?></p>
					</div>
					<div class="form-group">
						<label>Trạng thái đơn hàng :</label>
						<p>
							<?php echo ($cart->status == 1)?'Đợi giao hàng':FALSE; ?>
							<?php echo ($cart->status == 2)?'Đang giao hàng':FALSE; ?>
							<?php echo ($cart->status == 3)?'Giao hàng thành công':FALSE; ?>
						</p>
					</div>
					<div class="total">
						<span>Tổng cộng: <b><?php echo number_format($cart->total).' VND'; ?></b></span>
					</div>
				</div>
			</div>
		</div>
	</div>
</main>

<?php require 'footer.php'; ?>