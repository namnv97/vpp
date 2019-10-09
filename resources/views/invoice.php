<?php require 'header.php'; ?>
<main>
	<div class="container">
		<h3><?php echo $title; ?></h3>
		<hr>
		<table id="table_category" class="table">
			<thead>
				<tr>
					<th>STT</th>
					<th>Mã đơn hàng</th>
					<th>Số lượng</th>
					<th>Tổng tiền</th>
					<th>Ngày đặt hàng</th>
					<th></th>
				</tr>
			</thead>
			<tbody>
				<?php if(!empty($list_cart)): foreach($list_cart as $key => $cart): ?>
				<tr>
					<td><?php echo $key+1; ?></td>
					<td><?php echo $cart->code; ?></td>
					<td>
						<?php 
							$sl = json_decode($cart->list_product,true);
							if(!empty($sl))
							{
								$num = 0;
								foreach($sl as $s)
								{
									$num += $s['sl'];
								}
							}
							echo $num.' sản phẩm';
						 ?>
					</td>
					<td><?php echo number_format($cart->total); ?> VND</td>
					<td><?php echo date_format(date_create($cart->created_at),'d-m-Y H:i:s'); ?></td>
					<td><a href="<?php echo base_url.'don-hang/'.$cart->id; ?>" class="btn btn-md btn-primary" target="_blank">Xem đơn hàng</a></td>
				</tr>
				<?php endforeach; endif; ?>
			</tbody>
		</table>
	</div>
</main>
<?php 
	// echo '<pre>';
	// var_dump($list_cart);
	// echo '</pre>';
 ?>
<?php require 'footer.php'; ?>