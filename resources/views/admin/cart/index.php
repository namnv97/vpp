<?php require view_cus.'admin/header.php'; ?>
<div class="qldh">
	<div class="content_container">
		<h1>Quản lý đơn hàng</h1>
		<hr>
		<table id="table_category" class="table">
			<thead>
				<tr>
					<th>STT</th>
					<th>Mã đơn hàng</th>
					<th>Họ tên</th>
					<th>Email</th>
					<th>Số điện thoại</th>
					<th>Ngày đặt hàng</th>
					<th>Tổng tiền</th>
					<th></th>
				</tr>
			</thead>
			<tbody>
				<?php if(!empty($list_dh)): foreach($list_dh as $key => $cart): ?>
					<tr>
						<td><?= $key+1; ?></td>
						<td><?php //if($cart->status < 3): ?><a href="<?php echo base_url.'admin/don-hang/'.$cart->code; ?>"><b><?php echo $cart->code; ?></b></a> <?php //else: ?> <!-- <b><?php //echo $cart->code; ?></b> --> <?php //endif; ?></td>
						<td><?php echo $cart->ten_kh; ?></td>
						<td><?php echo $cart->email_kh; ?></td>
						<td><?php echo $cart->phone_kh; ?></td>
						<td><?php echo date_create($cart->created_at)->format('d/m/Y'); ?></td>
						<td><?php echo number_format($cart->total); ?> VND</td>
						<td>
							<?php 
							$stt = $cart->status; 
							if($stt == 1) echo 'Đợi giao hàng';
							if($stt == 2) echo 'Đang giao hàng';
							if($stt == 3) echo 'Giao hàng thành công';

							?>
						</td>
					</tr>
				<?php endforeach; endif; ?>
			</tbody>
		</table>
	</div>
</div>
<?php require view_cus.'admin/footer.php'; ?>