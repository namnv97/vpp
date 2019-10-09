<?php require view_cus.'header.php'; ?>

<main>
	<div class="container">
		<div class="row">
			<div class="col-xs-9 col-sm-9 col-md-9 col-lg-9">
				<h2>Danh sách đơn hàng</h2>
				<hr/>
				<table class="table">
					<thead>
						<tr>
							<th>STT</th>
							<th>Mã đơn hàng</th>
							<th>Tên khách hàng</th>
							<th>Email</th>
							<th></th>
						</tr>
					</thead>
					<tbody>
						<?php
							if(!empty($list_dh)):
								foreach($list_dh as $dh):
						?>
								<tr>
									<td>1</td>
									<td><?php echo $dh->id; ?></td>
									<td><?php echo $dh->ten_kh; ?></td>
									<td><?php echo $dh->email_kh; ?></td>
									<td><a href="<?php echo base_url.'don-hang/'.$dh->id; ?>" class="btn btn-success btn-sm">Xem đơn hàng</a></td>
								</tr>
							<?php endforeach; ?>
							<?php endif; ?>
					</tbody>
				</table>
			</div>
			<div class="col-xs-3 col-sm-3 col-md-3 col-lg-3">
				<?php require view_cus.'sidebar.php'; ?>
			</div>
		</div>
	</div>
</main>

<?php require view_cus.'footer.php'; ?>