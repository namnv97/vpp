<?php require 'header.php'; ?>
<div class="content_container">
	<!-- <h1><?php echo $head_title; ?></h1> -->
	<hr>
	<div class="dashboard_home">
		<div class="row">
			<div class="col-xs-4 col-sm-4 col-md-4 col-lg-4">
				<div class="item">
					<a class="btn btn-primary" href="<?php echo base_url.'admin/danh-sach-san-pham'; ?>">
						<h3>Sản phẩm</h3>
						<!-- ftag: product -->
						<div><?=$product_count?></div>
					</a>
				</div>
			</div>
			<div class="col-xs-4 col-sm-4 col-md-4 col-lg-4">
				<div class="item">
					<a class="btn btn-primary" href="<?php echo base_url.'admin/danh-sach-bai-viet'; ?>">
						<h3>Bài viết</h3>
						<!-- ftag: post -->
						<div><?=$post_count?></div>
					</a>
				</div>
			</div>
			<div class="col-xs-4 col-sm-4 col-md-4 col-lg-4">
				<div class="item">
					<a class="btn btn-primary" href="<?php echo base_url.'admin/users'; ?>">
						<h3>Người dùng</h3>
						<!-- ftag: User -->
						<div><?=$user_count?></div>
					</a>
				</div>
			</div>
		</div>
	</div>
</div>
<?php require 'footer.php'; ?>