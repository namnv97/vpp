<?php require view_cus.'admin/header.php'; ?>

<div class="edit_dh">
	<div class="content_container">
		<h1>Cập nhật đơn hàng - <?php echo $cart->code; ?></h1>
		<hr>
		<?php if(isset($ok)): ?>
			<div class="alert alert-success">Cập nhật đơn hàng thành công</div>
		<?php endif; ?>
		<div class="row">
			<div class="col-xs-6 col-sm-6 col-md-6 col-lg-6">
				<h3>Danh sách đơn hàng</h3>
				<table class="table table-stripped" style="background: #fff;">
					<thead>
						<tr>
							<th>STT</th>
							<th>Hình ảnh</th>
							<th>Số lượng</th>
							<th>Đơn giá</th>
							<th>Tổng cộng</th>
						</tr>
					</thead>
					<tbody>
						<?php 
							if(!empty($cart->list_product)):
								$list = json_decode($cart->list_product,true);
								$total = 0;
								foreach($list as $key => $product):
									$total += get_price($product['id'])*$product['sl'];
						?>
							<tr>
								<td><?php echo $key+1; ?></td>
								<td><img src="<?php echo base_url.get_thumbnail($product['id']); ?>" alt="<?php echo get_the_title($product['id']); ?>" width="50"></td>
								<td><?php echo $product['sl']; ?></td>
								<td><?php echo number_format(get_price($product['id'])).' VND'; ?></td>
								<td><?php echo number_format(get_price($product['id'])*$product['sl']).' VND'; ?></td>
							</tr>
							<?php endforeach; ?>
						<?php endif; ?>
					</tbody>
					<tfoot>
						<tr style="font-weight: bold;">
							<td colspan="4" align="center">Tổng đơn hàng</td>
							<td><?php echo number_format($total).' VND'; ?></td>
						</tr>
					</tfoot>
				</table>
			</div>
			<div class="col-xs-6 col-sm-6 col-md-6 col-lg-6">
				<form action="" method="post">
					<h3>Thông tin mua hàng</h3>
					<div class="form-group">
						<label>Họ tên</label>
						<input type="text" name="hoten" value="<?php echo $cart->ten_kh; ?>" class="form-control">
					</div>
					<div class="form-group">
						<label>Số điện thoại</label>
						<input type="text" name="phone" value="<?php echo $cart->phone_kh; ?>" class="form-control">
					</div>
					<div class="form-group">
						<label>Email</label>
						<input type="text" name="email" value="<?php echo $cart->email_kh; ?>" class="form-control">
					</div>
					<div class="form-group">
						<label>Địa chỉ</label>
						<input type="text" name="address" value="<?php echo $cart->address_kh; ?>" class="form-control">
					</div>
					<div class="form-group">
						<label>Trạng thái đơn hàng</label>
						<select name="stt" class="form-control">
							<option value="1" <?php echo ($cart->status == 1)?'selected':FALSE; ?>>Đợi giao hàng</option>
							<option value="2" <?php echo ($cart->status == 2)?'selected':FALSE; ?>>Đang giao hàng</option>
							<option value="3" <?php echo ($cart->status == 3)?'selected':FALSE; ?>>Giao hàng thành công</option>
						</select>
					</div>
					<div class="text-center">
						<button type="submit" class="btn btn-md btn-primary">Cập nhật</button>
					</div>
				</form>
			</div>
		</div>
	</div>
</div>

<?php require view_cus.'admin/footer.php'; ?>